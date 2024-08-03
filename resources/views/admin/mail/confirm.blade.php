<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <p>Xin chào {{ $order->user_name }},</p>
    <p>Chúng tôi đã nhận được đơn hàng của bạn với mã đơn hàng <strong>{{ $order->sku }}</strong>. Đơn hàng của bạn hiện đã được xác nhận đang ở trạng thái <strong>Đang xử lý</strong>.</p>
    <p>Thông tin đơn hàng:</p>
    <ul>
        <li>Địa chỉ: {{ $order->user_address }}</li>
        <li>Email: {{ $order->user_email }}</li>
        <li>Số điện thoại: {{ $order->user_phone }}</li>

        
    </ul>
    <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
    <p>Trân trọng, <br> Đội ngũ hỗ trợ khách hàng</p>
</body>
</html>
