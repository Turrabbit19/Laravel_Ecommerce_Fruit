@extends('client.layouts.master')

@section('content')
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Đăng nhập</h2>
                        <ul>
                            <li>
                                <a href='index.html'>Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Đăng nhập</li>
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
                    @error('wrong')
                        <p class="text-center text-danger">{{ $message }}</p>
                    @enderror
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title text-center">Đăng nhập</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-lg-12">
                                    <input type="password" placeholder="Mật khẩu" name="password">
                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-md-8">
                                    <div class="check-box">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Ghi nhớ mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-md-4 pt-1 mt-md-0">
                                    <div class="forgotton-password_info">
                                        <a href="#"> Bạn quên mật khẩu?</a>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-5 text-center">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0">Đăng nhập</button>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <span>Bạn mới biết đến Harmic?<a href="{{route('register')}}" class="register-link"> Đăng ký</a></span>
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

