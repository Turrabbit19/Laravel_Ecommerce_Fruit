@extends('client.layouts.master')

@section('content')

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Xác nhận email!</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Xác nhận</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="thank-you-area section-space-y-axis-100">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Xác minh địa chỉ email của bạn') }}</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                            </div>
                        @endif
    
                        {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để lấy liên kết xác minh.') }}
                        {{ __('Nếu bạn không nhận được email') }},
                        <form class="d-inline" method="POST" action="#">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('bấm vào đây để được gửi một yêu cầu khác') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
