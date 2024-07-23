<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProductController extends Controller
{
    const PATH_VIEW = "admin.products.";

    public function index()
    {
        $data = Product::query()->latest('id')->get();
        return view(SELF::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(SELF::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $pro = new Product;
        $pro->name = $request->name;
        $pro->slug = $request->slug;
        $pro->sku = $request->sku;
        if ($request->hasFile('img_thumb')) {
            $url = $request->file('img_thumb')->store('products', 'public');
        } else {
            $url = "";
        }
        $pro->img_thumb = $url;

        $pro->price = $request->price;
        $pro->price_sale = $request->price_sale;
        $pro->description = $request->description;
        $pro->quantity = $request->quantity;
        $pro->is_active = $request->is_active;
        
        $pro->save();
        return redirect('/admin/products')->with("success", "Thêm mới thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view(SELF::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view(SELF::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
    $pro = Product::find($product->id);
    $pro->name = $request->name;
    $pro->slug = $request->slug;
    $pro->sku = $request->sku;
    if ($request->hasFile('img_thumb')) {
        if ($pro->img_thumb) {
            Storage::disk('public')->delete($pro->img_thumb);
        }
        $url = $request->file('img_thumb')->store('products', 'public');
        $pro->img_thumb = $url;
    }

    $pro->price = $request->price;
    $pro->price_sale = $request->price_sale;
    $pro->description = $request->description;
    $pro->quantity = $request->quantity;
    $pro->is_active = $request->is_active;
    $pro->updated_at = Carbon::now();
    
    $pro->save();
    return redirect('/admin/products')->with("success", "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with("success", "Xóa thành công");
    }
}