@extends('email.layouts')
@section('title', 'Return Order Confirm')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Return Order Request Received</h1>
        <p>Dear {{$delivereds->customers_name}}</p>
        <p>We are sorry to hear that you are not satisfied with your recent purchase of [Product Name]. We want to ensure that you are completely satisfied with your shopping experience with us, and we would like to assist you in the return process.</p>
        <p>Please find your return order details below:</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($delivereds->order_product as $key => $delivered)
                    <td>{{$delivered->id}}</td>
                    <td>{{$delivered->products_name}}</td>
                    <td>{{$delivered->products_quantity}}</td>
                    <td>{{$delivered->products_price}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <p>Please follow the instructions below to return your order:</p>
        <ol>
            <li>Print the return label that was attached to your original order.</li>
            <li>Pack the product securely and include all original packaging, tags, and accessories.</li>
            <li>Attach the return label to the package.</li>
            <li>Drop off your package at the nearest shipping carrier location.</li>
        </ol>
        <p>Once we receive and process your return, we will issue a refund to your original payment method within [Number of Days] business days.</p>
        <p>If you have any questions or concerns regarding your return, please don't hesitate to contact our customer service team.</p>
        <p>Thank you for your business!</p>
 
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


@endsection