<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Mail\OrderConfirmed;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    const PATH_VIEW = "admin.orders.";

    public function index()
    {
        $data = Order::latest('id')->get();
        return view(self::PATH_VIEW . 'index', compact('data'));
    }

    public function show(Order $order)
    {
        $order->load('products');
        return view(self::PATH_VIEW . 'show', compact('order'));
    }

    public function updateStatus(Order $order)
    {
        switch ($order->status) {
            case 1:
                $order->status = 2; 
                Mail::to($order->user_email)->send(new OrderConfirmed($order));
                break;
            case 2:
                $order->status = 3; 
                break;
            case 3:
                $order->status = 4; 
                break;
            case 4:
                return redirect()->back()->with('error', 'Đơn hàng đã hoàn thành không thể cập nhật thêm.');
        }
        
        $order->save();

        return redirect()->back()->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Đơn hàng đã được xóa.');
    }
}