<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bill #{{$order->sku}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3, p {
            margin: 0 0 15px;
            padding: 0;
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        h2 {
            font-size: 20px;
            color: #555;
        }
        h3 {
            font-size: 18px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background: #f2f2f2;
        }
        .total {
            text-align: right;
            font-size: 16px;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bill #{{ $order->sku }}</h1>
        <p>Customer Name: {{ $order->user_name }}</p>
        <p>Email: {{ $order->user_email }}</p>
        <p>Address: {{ $order->user_address }}</p>
        <p>Phone: {{ $order->user_phone }}</p>

        <h2>Bill Detail</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $lineTotal = 0;
                @endphp
                @foreach($order->products as $detail)
                    @php
                        $lineTotal += $detail->quantity * $detail->price;
                    @endphp

                    <tr>
                        <td>{{ $detail->product_name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @php
            $discount = $lineTotal - $order->bill->total_amount;
        @endphp
        @if ($discount > 0)
            <h3 class="total">Discount: {{ number_format($discount ?? 0, 0, ',', '.') }} VND</h3>
            <h3 class="total">Subtotal: {{ number_format($lineTotal, 0, ',', '.') }} VND</h3>
        @endif
        <h3 class="total">Total Amount: {{ number_format($order->bill->total_amount, 0, ',', '.') }} VND</h3>
    </div>
</body>
</html>
