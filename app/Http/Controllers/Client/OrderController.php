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
        // Tạo đơn hàng
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
    
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart');

        $totalAmount = 0;
        foreach ($cart as $id => $items) {
            $totalAmount += $items['price'] * $items['quantity'];
        }
    
        // Tạo chi tiết đơn hàng
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

        // Tạo hóa đơn
        Bill::create([
            'order_id' => $order->id,
            'total_amount' => $totalAmount,
            'transaction_id' => strtoupper(bin2hex(random_bytes(16))),
        ]);
    
        // Xóa giỏ hàng
        session()->forget('cart');
    
        // Chuyển hướng tới trang cảm ơn
        return redirect()->route('thanks');
    }
}