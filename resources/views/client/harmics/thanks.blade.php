@extends('client.layouts.master')

@section('content')

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('style/client/images/breadcrumb/bg/1-1-1920x373.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Cảm ơn bạn!</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Trang chủ <i class="pe-7s-angle-right"></i></a>
                            </li>
                            <li>Thành công</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="thank-you-area section-space-y-axis-100">
        <div class="container">
            <div class="text-center">
                <h2>Thư cảm ơn</h2>
                <p>Cảm ơn bạn đã tin tưởng và chọn mua sản phẩm của chúng tôi. Đơn hàng của bạn đã được nhận và đang được xử lý.</p>
                <p>Hãy kiểm tra email của bạn để xem chi tiết đơn hàng và thông tin vận chuyển. Nếu có bất kỳ câu hỏi nào hoặc cần hỗ trợ thêm, đừng ngần ngại liên hệ với chúng tôi.</p>
                <a href="{{ route('shop') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div>
</main>

@endsection
