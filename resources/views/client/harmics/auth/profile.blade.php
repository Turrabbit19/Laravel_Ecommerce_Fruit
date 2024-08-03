@extends('client.layouts.master')

@section('content')
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg')}}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Trang cá nhân</h2>
                        <ul>
                            <li>
                                <a href='{{route('home')}}'>Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Trang cá nhân</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="account-page-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Hóa đơn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-address-tab" data-bs-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Địa chỉ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Hồ sơ</a>
                        </li>
                        <li class="nav-item">
                            <a aria-selected='false' class='nav-link' href='{{route('logout')}}' id='account-logout-tab' role='tab'>Đăng xuất</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-dashboard">
                                <p>Xin chào <b>{{Auth::user()->name}}</b> (không phải {{Auth::user()->name}}? <a href='{{route('logout')}}'>Đăng
                                        xuất</a>)</p>
                                        <p>Từ trang tài khoản của bạn, bạn có thể theo dõi hóa đơn của bạn, quản lý phần địa chỉ giao hàng và 
                                            <a href="javascript:void(0)">chỉnh sửa mật khẩu cũng như thông tin cá nhân của bạn</a>.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                            <div class="myaccount-orders">
                                <h4 class="small-title">Đơn hàng của tôi</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Đơn hàng</th>
                                                <th>Ngày</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng</th>
                                                <th></th>
                                            </tr>
                                            @foreach ($orders as $ords)
                                            <tr>
                                                <td><a class="account-order-id" href="javascript:void(0)">#{{$ords->sku}}</a></td>
                                                <td>{{date_format($ords->created_at, 'd/m/Y')}}</td>
                                                <td>
                                                    {{
                                                        $ords->status == 1 ? 'Chờ xác nhận' 
                                                        : ($ords->status == 2 ? 'Đang xử lý' 
                                                        : ($ords->status == 3 ? 'Đang giao hàng' 
                                                        : ($ords->status == 4 ? 'Hoàn thành' : 'Đã hủy')))
                                                    }}
                                                </td>
                                                <td>{{ number_format($ords->totalAmount, 0, ',', '.') }}đ cho {{ $ords->totalQuantity }} sản phẩm</td>
                                                <td><a href="javascript:void(0)" class="btn btn-secondary btn-primary-hover"><span>Xem</span></a>                                            </tr>
                                            @endforeach
                                        </tbody>                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                            <div class="myaccount-address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="small-title">BILLING ADDRESS</h4>
                                        <address>
                                            1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                        </address>
                                    </div>
                                    <div class="col">
                                        <h4 class="small-title">SHIPPING ADDRESS</h4>
                                        <address>
                                            1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                            <div class="myaccount-details">
                                <form action="#" class="myaccount-form">
                                    <div class="myaccount-form-inner">
                                        <div class="single-input">
                                            <label>Họ và tên</label>
                                            <input type="text" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="single-input">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{Auth::user()->email}}">
                                        </div>
                                        <div class="single-input">
                                            <label>Mật khẩu hiện tại(bỏ qua nếu không thay đổi)</label>
                                            <input type="password">
                                        </div>
                                        <div class="single-input">
                                            <label>Mật khẩu mới(bỏ qua nếu không thay đổi)</label>
                                            <input type="password" name="password">
                                        </div>
                                        <div class="single-input">
                                            <label>Xác nhận mật khẩu</label>
                                            <input type="password">
                                        </div>
                                        <div class="single-input">
                                            <button class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0" type="submit">
                                                <span>Lưu thay đổi</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection