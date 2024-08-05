<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Coupon;

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

        $total = $subtotal;

        return view('client.harmics.checkout')
            ->with('categories', $categories)
            ->with('cart', $cart)
            ->with('subtotal', $subtotal)
            ->with('total', $total)
            ->with('discount', 0);
    }

    public function useCoupon(Request $request)
{
    $couponCode = $request->coupon;
    $cart = session()->get('cart', []);
    $subtotal = 0;

    foreach ($cart as $items) {
        $subtotal += $items['price'] * $items['quantity'];
    }

    $coupon = Coupon::where('sku', $couponCode)->first();

    if (!$coupon) {
        return redirect()->back()->with('error', 'Mã phiếu giảm giá không hợp lệ.');
    }

    if ($coupon->end_date < now()) {
        return redirect()->back()->with('error', 'Mã phiếu giảm giá đã hết hạn.');
    }

    $discount = $coupon->discount; 
    $totalAfterDiscount = max(0, $subtotal - $discount);

    $request->session()->put('discount', $discount);
    $request->session()->put('total', $totalAfterDiscount);

    return redirect()->back()
        ->with('success', 'Phiếu giảm giá đã được áp dụng.');
}

    public function thankYou() 
    {
        $categories = Category::all();

        return view('client.harmics.thanks', compact('categories'));
    }
}