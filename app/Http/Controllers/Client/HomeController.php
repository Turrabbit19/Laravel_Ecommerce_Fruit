<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    const PATH_VIEW = "client.harmics.";

    public function index()
    {
        $categories = Category::all();
        $products = Product::query()->latest('id')->take(8)->get();
        $cart = session()->get('cart', []);

        return view(self::PATH_VIEW . 'index', compact('categories', 'products', 'cart'));
    }

    public function shop()
    {
        $categories = Category::all();
        $products = Product::paginate(9);
        $cart = session()->get('cart', []);

        return view(self::PATH_VIEW . 'shop', compact('categories', 'products', 'cart'));
    }

    public function product(Product $product)
    {
        $categories = Category::all();
        $products = Product::query()->latest('id')->take(8)->get();
        $cart = session()->get('cart', []);
        
        $product->increment('view');
        return view(self::PATH_VIEW . 'product', compact('categories', 'products', 'product', 'cart'));
    }
}