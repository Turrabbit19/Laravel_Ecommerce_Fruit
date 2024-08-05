<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Coupon;

class CartController extends Controller
{
    public function addToCart(Request $request, $id) 
    {    
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        
        $sizeId = $request->size;
        $colorId = $request->color;
        $quantity = $request->quantity;

        if($sizeId && $colorId) {
            $variant = $product->variants()
            ->where('product_size_id', $sizeId)
            ->where('product_color_id', $colorId)
            ->first();

            if (!$variant || $variant->quantity < $quantity) {
                return redirect()->back()->with('error', 'Số lượng không đủ hoặc biến thể không tồn tại.');
            }
            
            $variantKey = "{$id}_{$sizeId}_{$colorId}";

            if (isset($cart[$variantKey])) {
                $cart[$variantKey]['quantity'] += $quantity;
            } else {
                $cart[$variantKey] = [
                    "id" => $product->id,
                    "name" => $product->name,
                    "price" => $product->price,
                    "quantity" => $quantity,
                    "image" => $product->img_thumb,
                    "size" => $variant->size->name,
                    "color" => $variant->color->name,
                ];
            }
        } else {
            if(isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;
            } else {
                $cart[$id] = [
                    "name" => $product->name,
                    "price" => $product->price,
                    "quantity" => $quantity,
                    "image" => $product->img_thumb
                ];
            }
        }
        
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function viewCart()
    {
        $categories = Category::all();
        $cart = session()->get('cart');

        return view('client.harmics.cart', compact('cart', 'categories'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart');

        foreach ($request->quantity as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật!');
    }
}