<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>

<body>
    @php
        $order = DB::table('orders')->find(session('order_id'));
        $orderItems = DB::table('order_items')
            ->where('order_id', session('order_id'))
            ->get();
    @endphp
    <p>Hi {{ $order->firstname }} {{ $order->lastname }}</p>
    <p>Your order has been successfully placed.</p>
    <br />

    <table style="width: 600px; text-align:right">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
                <tr>
                  
                    <td>{{ DB::table('products')->find($item->product_id)->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price * $item->quantity }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align:right;border-top:1px solid #ccc;">Total</td>
                <td style="font-size: 15px;font-weight:bold;border-top:1px solid #ccc;">Subtotal :
                    Rs{{ $order->subtotal }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right">Total</td>
                <td style="font-size: 15px;font-weight:bold;">Tax : {{ $order->tax }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right">Total</td>
                <td style="font-size: 15px;font-weight:bold;">Shipping : Free Shiping</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right">Total</td>
                <td style="font-size: 15px;font-weight:bold;">Total : Rs{{ $order->total }}</td>
            </tr>
        </tbody>

    </table>

</body>

</html>
