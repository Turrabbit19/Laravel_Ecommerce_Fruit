<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    const PATH_VIEW = "client.harmics.";

    public function index()
    {
        $categories = Category::all();
        $products = Product::query()->where('is_active', true)->latest('id')->take(8)->get();
        $prosView = Product::query()->where('is_active', true)->latest('view')->take(6)->get();
        $banners = Banner::query()->where('is_active', true)->latest('id')->take(3)->get();

        $cart = session()->get('cart', []);

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'products', 'prosView', 'banners', 'cart'));
    }

    public function shop()
    {
        $categories = Category::all();
        $products = Product::where('is_active', true)->latest('id')->paginate(9);
        $prosRate = Product::query()->where('is_active', true)->latest('view')->take(6)->get();

        $cart = session()->get('cart', []);

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'products', 'cart'));
    }

    public function product(Product $product)
    {
        $categories = Category::all();
        $products = Product::query()->where('is_active', true)->latest('id')->take(8)->get();

        $product->load('galleries', 'variants.size', 'variants.color', 'categories');
        $imageProduct = $product->galleries;
        $variantProduct = $product->variants;
        $cart = session()->get('cart', []);
        
        $sizes = $variantProduct ? $variantProduct->pluck('size.name', 'size.id')->unique() : null;
        $colors = $variantProduct ? $variantProduct->pluck('color.name', 'color.id')->unique() : null;

        $product->increment('view');

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'products', 'product', 'imageProduct', 'sizes', 'colors', 'cart'));   
    }

    public function about() {
        $categories = Category::all();
        $cart = session()->get('cart', []);

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'cart'));
    }
}