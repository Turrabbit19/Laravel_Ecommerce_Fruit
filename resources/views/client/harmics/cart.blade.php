@extends('client.layouts.master')

@section('content')
<style>
    .cart-plus-minus-box::-webkit-inner-spin-button,
    .cart-plus-minus-box::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .cart-plus-minus-box {
        -moz-appearance: textfield; 
        appearance: textfield; 
    }
</style>

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Giỏ hàng</h2>
                        <ul>
                            <li>
                                <a href='index.html'>Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-area section-space-y-axis-100">
        <div class="container">
            @if (session('success'))
                <div class="text-center text-success mb-3">        
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('cart') && count(session('cart')) > 0)
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('updateCart') }}" method="POST">
                            @csrf
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Xóa</th>
                                            <th class="product-thumbnail">Ảnh</th>
                                            <th class="cart-product-name">Sản phẩm</th>
                                            <th class="cart-product-size">Kích thước</th>
                                            <th class="cart-product-color">Màu sắc</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                        @endphp
                                        @foreach (session('cart') as $id => $items)
                                            @php
                                                $lineTotal = $items['price'] * $items['quantity'];
                                                $subtotal += $lineTotal;
                                            @endphp
                                            <tr>
                                                <td class="product_remove">
                                                    <a href="{{ route('removeFromCart', $id) }}">
                                                        <i class="pe-7s-close" title="Remove"></i>
                                                    </a>
                                                </td>
                                                <td class="product-thumbnail" width="170">
                                                    <a href="javascript:void(0)">
                                                        <img src="{{ Storage::url($items['image']) }}" alt="Cart Thumbnail">
                                                    </a>
                                                </td>
                                                <td class="product-name"><a href="javascript:void(0)">{{ $items['name'] }}</a></td>
                                                <td class="product-name"><a href="javascript:void(0)">{{ isset($items['size']) ? $items['size'] : 'Khum' }}</a></td>
                                                <td class="product-name"><a href="javascript:void(0)">{{ isset($items['color']) ? $items['color'] : 'Khum' }}</a></td>
                                                <td class="product-price"><span class="amount">{{ number_format($items['price']) }} VND</span></td>
                                                <td class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" name="quantity[{{ $id }}]" value="{{ $items['quantity'] }}" type="number" min="1">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">{{ number_format($lineTotal) }} VND</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Phiếu giảm giá" type="text">
                                            <input class="button mt-xxs-30" name="apply_coupon" value="Áp dụng" type="submit">
                                        </div>
                                        <div class="coupon2">
                                            <input class="button" name="update_cart" value="Cập nhật" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Tổng hóa đơn</h2>
                                        <ul>
                                            <li>Giá <span>{{ number_format($subtotal) }} VND</span></li>
                                            <li>Tổng <span>{{ number_format($subtotal) }} VND</span></li>
                                        </ul>
                                        <a href="{{ route('checkout') }}">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="text-center">
                    <h2>Giỏ hàng trống</h2>
                    <p>Hiện tại giỏ hàng của bạn không có sản phẩm nào. Vui lòng thêm sản phẩm để tiếp tục.</p>
                </div>
            @endif
        </div>
    </div>
</main>

@endsection
