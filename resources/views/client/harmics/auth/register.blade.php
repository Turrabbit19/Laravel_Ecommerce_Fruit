@extends('client.layouts.master')

@section('content')
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Đăng ký</h2>
                        <ul>
                            <li>
                                <a href='index.html'>Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Đăng ký</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-register-area section-space-y-axis-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title text-center">Đăng ký</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" placeholder="Họ và tên" name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="password" placeholder="Mật khẩu" name="password">
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation">
                                    @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0">Đăng ký</button>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <span>Bạn đã có tài khoản?<a href="{{ route('login') }}" class="register-link"> Đăng nhập</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .register-link {
        color: red;
        text-decoration: none;
        transition-duration: 0.3ms;
    }
    .register-link:hover {
        color: #bac34e;
    }
</style>
@endsection