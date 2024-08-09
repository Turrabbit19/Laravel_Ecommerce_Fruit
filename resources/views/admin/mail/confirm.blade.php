<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        h1 {
            color: #007bff;
        }
        .order-details, .product-list {
            margin-top: 20px;
        }
        .product-list table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-list th, .product-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .product-list th {
            background-color: #f4f4f4;
        }
        .total-amount {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Xác nhận đơn hàng</h1>
    <p>Xin chào {{ $order->user_name }},</p>
    <p>Chúng tôi đã nhận được đơn hàng của bạn với mã đơn hàng <strong>{{ $order->sku }}</strong>. Đơn hàng của bạn hiện đã được xác nhận và đang ở trạng thái <strong>Đang xử lý</strong>.</p>
    
    <div class="order-details">
        <p>Thông tin đơn hàng:</p>
        <ul>
            <li>Địa chỉ: {{ $order->user_address }}</li>
            <li>Email: {{ $order->user_email }}</li>
            <li>Số điện thoại: {{ $order->user_phone }}</li>
        </ul>
    </div>
    
    <div class="product-list">
        <p>Chi tiết sản phẩm trong đơn hàng:</p>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Kích cỡ</th>
                    <th>Màu sắc</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalBeforeDiscount = 0;
                @endphp
                @foreach ($order->products as $detail)
                @php
                    $subtotal = $detail->quantity * $detail->price;
                    $totalBeforeDiscount += $subtotal;
                @endphp
                <tr>
                    <td>{{ $detail->product_name }}</td>
                    <td>{{ $detail->size }}</td>
                    <td>{{ $detail->color }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($subtotal, 0, ',', '.') }} đ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="total-amount">
        @php
            $discount = $totalBeforeDiscount - $order->bill->total_amount;
        @endphp
        @if($discount > 0)
        <p>Giảm giá: {{ number_format($discount, 0, ',', '.') }} đ</p>
        <p>Tổng số tiền trước giảm giá: {{ number_format($totalBeforeDiscount, 0, ',', '.') }} đ</p>
        @endif
        <p>Tổng số tiền phải trả: {{ number_format($order->bill->total_amount, 0, ',', '.') }} đ</p>
    </div>
    
    <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
    <p>Trân trọng, <br> Đội ngũ hỗ trợ khách hàng</p>
</body>
</html>
