<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; text-align: center; color: #333;">
    <div style="max-width: 600px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #333333; font-size: 24px; margin-bottom: 20px;">Xin chào {{$userName}}</h2>
        <p style="font-size: 16px; margin-bottom: 20px;">Cảm ơn bạn đã tham gia cộng đồng Harmic của chúng tôi</p>
        <p style="font-size: 16px; margin-bottom: 20px;">Xin mời xác thực tài khoản để tiếp tục sử dụng hệ thống</p>
        <a href="{{route('verifyEmail', $token)}}" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #ffffff; background-color: #007bff; text-decoration: none; border-radius: 5px;">Xác thực tài khoản</a>
    </div>
</body>
</html>
