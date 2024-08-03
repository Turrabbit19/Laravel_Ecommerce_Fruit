<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $categories = Category::all();
        $cart = session()->get('cart', []);
        $orders = Order::where('user_id', Auth::user()->id)->with('products')->get();
    
        foreach ($orders as $order) {
            $order->totalAmount = 0;
            $order->totalQuantity = 0;
            foreach ($order->products as $product) {
                $order->totalAmount += $product->price * $product->quantity;
                $order->totalQuantity += $product->quantity;
            }
        }
    
        return view('client.harmics.auth.profile', compact('categories', 'cart', 'orders'));
    }
    
}