<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Bill;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function order(StoreOrderRequest $request)
{
    $order = Order::create([
        'user_id' => Auth::id(),
        'sku' => 'KDZ-' . Str::upper(Str::random(9)), 
        'user_name' => $request->name,
        'user_email' => $request->email,
        'user_city' => $request->city,
        'user_address' => $request->address,
        'user_phone' => $request->phone,
        'note' => $request->note,
        'payment_method' => $request->payment_method,
        'status' => '1', // Chờ xử lý
    ]);
    
    $cart = session()->get('cart', []);
    $discount = session()->get('discount', 0);
    $totalAfterDiscount = session()->get('total', 0);

    $totalAmount = 0;
    foreach ($cart as $id => $items) {
        $totalAmount += $items['price'] * $items['quantity'];
    }

    if ($discount > 0) {
        $total = $totalAfterDiscount;
    } else {
        $total = $totalAmount;
    }
    
    foreach ($cart as $id => $items) {
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'product_name' => $items['name'],
            'product_image' => $items['image'],
            'size' => $items['size'] ?? null,
            'color' => $items['color'] ?? null,
            'quantity' => $items['quantity'],
            'price' => $items['price'],
        ]);
    }

    Bill::create([
        'order_id' => $order->id,
        'total_amount' => $total,
        'transaction_id' => strtoupper(bin2hex(random_bytes(16))),
    ]);
    
    session()->forget('cart');
    session()->forget('discount');
    session()->forget('total');
    
    return redirect()->route('thanks');
}


}