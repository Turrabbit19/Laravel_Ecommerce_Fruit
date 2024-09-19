<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    const PATH_VIEW = "client.harmics.";

    protected function loadCommonData()
    {
        $categories = Category::all();
        $cart = session()->get('cart', []);

        return compact('categories', 'cart');
    }

    public function index()
    {
        $products = Product::where('is_active', true)->latest('id')->take(8)->get();
        $prosView = Product::where('is_active', true)->latest('view')->take(6)->get();
        $banners = Banner::where('is_active', true)->latest('id')->take(3)->get();

        return view(self::PATH_VIEW . __FUNCTION__, array_merge($this->loadCommonData(), compact('products', 'prosView', 'banners')));
    }

    public function shop()
    {
        $search = request()->query('search');

        $productSearch = Product::where('is_active', true);

        if ($search) {
            $productSearch->where('name', 'like', '%' . $search . '%')
                 ->whereRaw('BINARY name like ?', ['%' . $search . '%']);
        }

        $products = $productSearch->latest('id')->paginate(9);
        $prosRate = Product::where('is_active', true)->latest('view')->take(3)->get();

        return view(self::PATH_VIEW . __FUNCTION__, array_merge($this->loadCommonData(), compact('products', 'prosRate')));
    }


    public function product(Product $product)
    {
        $products = Product::where('is_active', true)->latest('id')->take(8)->get();

        $product->load('galleries', 'variants.size', 'variants.color', 'categories');
        $imageProduct = $product->galleries;
        $variantProduct = $product->variants;
        
        $sizes = $variantProduct ? $variantProduct->pluck('size.name', 'size.id')->unique() : null;
        $colors = $variantProduct ? $variantProduct->pluck('color.name', 'color.id')->unique() : null;

        $product->increment('view');

        return view(self::PATH_VIEW . __FUNCTION__, array_merge($this->loadCommonData(), compact('products', 'product', 'imageProduct', 'sizes', 'colors')));
    }

    public function about()
    {
        return view(self::PATH_VIEW . __FUNCTION__, $this->loadCommonData());
    }

    public function contact()
    {
        return view(self::PATH_VIEW . __FUNCTION__, $this->loadCommonData());
    }
}