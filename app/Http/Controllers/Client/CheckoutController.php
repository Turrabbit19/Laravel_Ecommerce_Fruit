<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CheckoutController extends Controller
{
    public function viewCheckout()
{
    $categories = Category::all();
    $cart = session('cart', []);
    $subtotal = 0;

    foreach ($cart as $items) {
        $subtotal += $items['price'] * $items['quantity'];
    }

    $shippingCost = 0;
    $total = $subtotal + $shippingCost;

    return view('client.harmics.checkout')
        ->with('categories', $categories)
        ->with('cart', $cart)
        ->with('subtotal', $subtotal)
        ->with('shippingCost', $shippingCost)
        ->with('total', $total);
}

    public function thankYou() 
    {
        $categories = Category::all();
        session()->forget('cart');

    return view('client.harmics.thanks', compact('categories'));
    } 
}