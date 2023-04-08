@extends('email.layouts')
@section('title', 'Order Delivereds')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        padding: 20px;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        margin: 0 auto;
    }

    h1 {
        font-size: 24px;
        color: #333;
        margin-top: 0;
    }

    .order-info {
        margin-top: 20px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .order-info .item {
        width: 100%;
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .item-image {
        width: 150px;
        margin-right: 20px;
    }

    .item-image img {
        max-width: 100%;
        height: auto;
    }

    .item-details {
        flex: 1;
    }

    .item-name {
        font-size: 18px;
        color: #333;
        margin: 0;
    }

    .item-price {
        font-size: 16px;
        color: #333;
        margin: 0;
        margin-top: 10px;
    }

    .order-total {
        font-size: 24px;
        color: #333;
        margin: 0;
        margin-top: 20px;
        text-align: right;
    }

    .button {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        margin-top: 20px;
    }

    .button:hover {
        background-color: #0069d9;
    }
</style>
<div class="container">
   
    <div class="order-info">
        <div class="order-details">
            <h2>Order Details</h2>
            <p><strong>Order Number:</strong> {{$orders->id}}</p>
            <p><strong>Order Date:</strong><?php echo date(today()); ?></p>
            <p><strong>Order Total:</strong> {{$orders->order_price}}</p>
            <p><strong>Payment Type :</strong>{{$orders->pyment_type}}</p>
            @if($orders->pyment_type == "pay")
            <p><strong>Transection Id:</strong>{{$orders->transaction_id}}</p>
            @endif
        </div>
     
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection