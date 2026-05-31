<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>

<h2>Payment Receipt</h2>

<hr>

<p>
    <strong>Name:</strong>
    {{ $payment->name }}
</p>

<p>
    <strong>Email:</strong>
    {{ $payment->email }}
</p>

<p>
    <strong>Payment ID:</strong>
    {{ $payment->razorpay_order_id }}
</p>

<p>
    <strong>Order ID:</strong>
    {{ $payment->order_id }}
</p>

<p>
    <strong>Amount:</strong>
    ₹{{ $payment->amount }}
</p>

<p>
    <strong>Status:</strong>
    {{ $payment->status }}
</p>

</body>
</html>