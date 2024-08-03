@extends('admin.layouts.master')

@section('title')
    Chi tiết đơn hàng
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form>
            <fieldset disabled>
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sku" class="form-label">Mã đơn hàng:</label>
                                <input type="text" id="sku" class="form-control" value="{{ $order->sku }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_name" class="form-label">Khách hàng:</label>
                                <input type="text" id="user_name" class="form-control" value="{{ $order->user_name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_address" class="form-label">Địa chỉ:</label>
                                <input type="text" id="user_address" class="form-control" value="{{ $order->user_address }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_email" class="form-label">Email:</label>
                                <input type="text" id="user_email" class="form-control" value="{{ $order->user_email }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_phone" class="form-label">Số điện thoại:</label>
                                <input type="text" id="user_phone" class="form-control" value="{{ $order->user_phone }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="note" class="form-label">Ghi chú:</label>
                                <input type="text" id="note" class="form-control" value="{{ $order->note }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment_method" class="form-label">Phương thức thanh toán:</label>
                                <input type="text" id="payment_method" class="form-control" value="{{ 
                                    $order->payment_method == 1 ? 'Thanh toán trực tiếp' 
                                    : ($order->payment_method == 2 ? 'Thanh toán qua ngân hàng' 
                                    : ($order->payment_method == 3 ? 'Momo' : 'Không xác định'))
                                }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status" class="form-label">Trạng thái:</label>
                                <input type="text" id="status" class="form-control" value="{{ 
                                    $order->status == 1 ? 'Chờ xác nhận' 
                                    : ($order->status == 2 ? 'Đang xử lý' 
                                    : ($order->status == 3 ? 'Đang giao hàng' 
                                    : ($order->status == 4 ? 'Hoàn thành' : 'Đã hủy')))
                                }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="created_at" class="form-label">Ngày tạo:</label>
                                <input type="text" id="created_at" class="form-control" value="{{ date_format($order->created_at, 'd/m/Y H:i:s') }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="updated_at" class="form-label">Ngày cập nhật:</label>
                                <input type="text" id="updated_at" class="form-control" value="{{ $order->updated_at == $order->created_at ? '' : date_format($order->updated_at, 'd/m/Y H:i:s') }}" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Thông tin sản phẩm -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="products" class="form-label">Sản phẩm:</label>
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Kích thước</th>
                                            <th>Màu sắc</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalAmount = 0; 
                                        @endphp
                                        @foreach($order->products as $pros)
                                            @php
                                                $itemTotal = $pros->quantity * $pros->price;
                                                $totalAmount += $itemTotal;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <img src="{{ Storage::url($pros->product_image) }}" alt="{{ $pros->product_name }}" width="123">
                                                </td>
                                                <td>{{ $pros->product_name }}</td>
                                                <td>{{ $pros->size }}</td>
                                                <td>{{ $pros->color }}</td>
                                                <td>{{ $pros->quantity }}</td>
                                                <td>{{ number_format($pros->price, 0, ',', '.') }}đ</td>
                                                <td>{{ number_format($itemTotal, 0, ',', '.') }}đ</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4"><strong>Tổng cộng:</strong></td>
                                            <td><strong>{{ number_format($totalAmount, 0, ',', '.') }}đ</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="text-center">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-success text-decoration-none text-white">Danh sách đơn hàng</a>
            </div>
        </form>
    </div>
</div>

@endsection
