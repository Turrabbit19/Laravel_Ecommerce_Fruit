<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    const PATH_VIEW = "admin.products.";

    public function index()
    {
        $products = Product::latest('id')->get();
        return view(self::PATH_VIEW . 'index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $sizes = ProductSize::pluck('name', 'id')->all();
        $colors = ProductColor::pluck('name', 'id')->all();
        return view(self::PATH_VIEW . 'create', compact('categories', 'sizes', 'colors'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $this->prepareProductData($request);

        DB::transaction(function () use ($data, $request) {
            $product = Product::create($data);

            if ($request->has('categories')) {
                $product->categories()->sync($request->categories);
            }
            
            $this->storeProductVariants($product, $request->product_variants);
            $this->storeProductGalleries($product, $request->product_galleries);
        });

        return redirect()->route('admin.products.index')->with('success', 'Thêm mới thành công');
    }

    public function show(Product $product)
    {
        $categories = Category::pluck('name', 'id')->all();
        $sizes = ProductSize::pluck('name', 'id')->all();
        $colors = ProductColor::pluck('name', 'id')->all();
        return view(self::PATH_VIEW . 'show', compact('product', 'categories', 'sizes', 'colors'));
    }

    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id')->all();
        $sizes = ProductSize::pluck('name', 'id')->all();
        $colors = ProductColor::pluck('name', 'id')->all();
        return view(self::PATH_VIEW . 'edit', compact('product', 'categories', 'sizes', 'colors'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->updateProductData($product, $request);

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }    

        $this->updateProductVariants($product, $request->product_variants);
        if ($request->hasFile('product_galleries')) {
            $this->updateProductGalleries($product, $request->file('product_galleries'));
        }

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Product $product)
    {
        $this->deleteProductRelations($product);
        $product->delete();
        return back()->with("success", "Xóa thành công");
    }

    private function prepareProductData($request)
    {
        $data = $request->except(['product_variants', 'img_thumb', 'product_galleries']);
        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('img_thumb')) {
            $data['img_thumb'] = $request->file('img_thumb')->store('products', 'public');
        }

        return $data;
    }

    private function updateProductData(Product $product, $request)
    {
        $product->fill($request->except(['img_thumb', 'product_variants', 'product_galleries']));
        $product->slug = Str::slug($request->name);
        $product->updated_at = Carbon::now();

        if ($request->hasFile('img_thumb')) {
            if ($product->img_thumb) {
                Storage::disk('public')->delete($product->img_thumb);
            }
            $product->img_thumb = $request->file('img_thumb')->store('products', 'public');
        }

        $product->save();
    }

    private function storeProductVariants(Product $product, array $variants)
{
    $totalQuantity = 0;

    foreach ($variants as $vars) {
        $variant = $product->variants()->create([
            'product_size_id' => $vars['size'],
            'product_color_id' => $vars['color'],
            'quantity' => $vars['quantity'] ?? 0
        ]);

        $totalQuantity += $variant->quantity;
    }

    $product->quantity = $totalQuantity;
    $product->save();
}


    private function storeProductGalleries(Product $product, array $galleries)
    {
        foreach ($galleries as $glrs) {
            $product->galleries()->create([
                'image' => Storage::put('product_galleries', $glrs)
            ]);
        }
    }

    private function updateProductVariants(Product $product, array $variants)
    {
        $totalQuantity = 0;
    
        foreach ($variants as $item) {
            $variant = $product->variants()->updateOrCreate(
                ['product_size_id' => $item['size'], 'product_color_id' => $item['color']],
                ['quantity' => $item['quantity'] ?? 0]
            );
    
            $totalQuantity += $variant->quantity;
        }
    
        $product->quantity = $totalQuantity;
        $product->save();
    }
    

    private function updateProductGalleries(Product $product, array $galleries)
    {
        $product->galleries()->each(function ($gallery) {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        });
    
        foreach ($galleries as $item) {
            $product->galleries()->create([
                'image' => Storage::put('product_galleries', $item)
            ]);
        }
    }

    private function deleteProductRelations(Product $product)
    {
        $product->variants()->delete();
        $product->galleries()->delete();
    
        $product->quantity = 0;
        $product->save();
    
        if ($product->img_thumb) {
            Storage::disk('public')->delete($product->img_thumb);
        }
    
        foreach ($product->galleries as $gallery) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
        }
    }
    
}