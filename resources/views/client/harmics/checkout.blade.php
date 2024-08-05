@extends('client.layouts.master')

@section('content')
   
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Thanh toán</h2>
                        <ul>
                            <li>
                                <a href='{{route('home')}}'>Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('success')) 
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                    @if (session('error'))     
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                    <div class="coupon-accordion">
                        <h3>Bạn có mã giảm giá? <span id="showcoupon">Nhấn vào đây để nhập nó</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="{{route('useCoupon')}}" method="POST">
                                    @csrf
                                    <p class="checkout-coupon">
                                        <input placeholder="Mã giảm giá" type="text" name="coupon">
                                        <input class="coupon-inner_btn" value="Xác nhận" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <form action="{{route('order')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="javascript:void(0)">
                            <div class="checkbox-form">
                                <h3>Chi tiết thanh toán</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Họ và tên</label>
                                            <input placeholder="Nguyễn Văn A" value="{{Auth::user()->name}}" type="text" name="name">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <label>Thành phố <span class="required">*</span></label>
                                            <select class="myniceselect nice-select wide" name="city">
                                                <option data-display="Chọn...">Chọn...</option>
                                                <option value="Hà Nội">Hà Nội</option>
                                                <option value="Đà Nẵng">Đà Nẵng</option>
                                                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                                <option value="Nam Định">Nam Định</option>
                                                <option value="Quảng Nam">Quảng Nam</option>
                                            </select>
                                            @error('city')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Địa chỉ</label>
                                            <input placeholder="Kiến Hưng, Hà Đông, Hà Nội..." type="text" name="address">
                                            @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email <span class="required">*</span></label>
                                            <input placeholder="example@gmail.com" value="{{Auth::user()->email}}" type="email" name="email">
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Số điện thoại</label>
                                            <input placeholder="0123456789" type="text" name="phone">
                                            @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="order-notes">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Ghi chú</label>
                                        <textarea id="note" cols="30" rows="10" placeholder="Nếu có gì cần thêm vui lòng ghi chú ở đây." name="note"></textarea>
                                        @error('note')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $id => $items)
                                            <tr class="cart_item">
                                                <td class="cart-product-name">{{ $items['name'] }}<strong class="product-quantity"> × {{ $items['quantity'] }}</strong>
                                                    @if (isset($items['size']) && isset($items['color']))
                                                        <br>
                                                        <small>Size: {{ $items['size'] }}, Color: {{ $items['color'] }}</small>
                                                    @endif
                                                    
                                                </td>
                                                <td class="cart-product-total text-center"><span class="amount">{{ number_format($items['price'] * $items['quantity']) }}đ</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Giá ban đầu</th>
                                            <td class="text-center"><span class="amount">{{ number_format($subtotal) }}đ</span></td>
                                        </tr>
                                        <tr class="use-coupon">
                                            <th>Giảm</th>
                                            <td class="text-center"><span class="amount">{{ session('discount') ? number_format(session('discount')) . 'đ' : '0' }}</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng</th>
                                            <td class="text-center"><strong><span class="amount">{{ session('total') ? number_format(session('total')) . 'đ' : number_format($subtotal) . 'đ' }}</span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h6 class="panel-title">
                                                    <input class="form-check-input" type="radio" name="payment_method" id="home" value="1" checked>
                                                    
                                                    <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                        Thanh toán trực tiếp khi nhận hàng
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Thanh toán khi nhận hàng tại địa chỉ của bạn. Vui lòng chuẩn bị đủ số tiền theo đơn hàng để thanh toán cho nhân viên giao hàng.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-2">
                                                <h5 class="panel-title">
                                                    <input class="form-check-input" type="radio" name="payment_method" id="bank" value="2">

                                                    <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                                        Thanh toán bằng tài khoản ngân hàng
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Chuyển khoản ngân hàng. Vui lòng sử dụng mã đơn hàng của bạn làm tham chiếu. Đơn hàng sẽ giao khi thanh toán hoàn tất.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-3">
                                                <h5 class="panel-title">
                                                    <input class="form-check-input" type="radio" name="payment_method" id="momo" value="3">
                                                    <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false">
                                                        Momo
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Thanh toán qua ví điện tử Momo. Vui lòng sử dụng mã đơn hàng của bạn làm tham chiếu. Đơn hàng sẽ giao khi thanh toán hoàn tất.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input value="Place order" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
