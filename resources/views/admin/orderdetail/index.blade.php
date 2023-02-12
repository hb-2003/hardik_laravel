@extends('layouts.admin.app')

@section('title', 'content')

@section('css')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('style')
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>#{{$orderdetails->id}} </h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-rgb(52,58,64)">
                        <div class="card-header">
                            <h3 class="card-title">Order detail</h3>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderdetails->order_product as $product)
                                    <tr>
                                        <th scope="row">
                                            <div>
                                                <img src="{{asset('images/product/'.$product->products_image)}}" alt="" class="" width="100">
                                            </div>
                                        </th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-16">{{$product->products_name}}</h5>

                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <p class="text-muted mb-0">$ {{$product->products_price}} * {{$product ->products_quantity}}</p>
                                            </div>
                                        </td>
                                        <td>₹ {{$product->products_price}}</td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <div class=" p-2 text-right">
                                <h5>Sub Total : ₹ {{$orderdetails->order_price}}</h5>
                            </div>
                            <div class=" p-2   text-right " style="margin-right: 6.5%;">
                                <h5>Shipping :@if($orderdetails->shipping_method == 0)
                                    Free
                                    @else
                                    ₹50
                                    @endif</h5>
                            </div>
                            <hr>
                            <div class=" p-2 text-right ">
                                <h5> Total : ₹ {{$orderdetails->order_price}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-rgb(52,58,64)">
                        <div class="card-header">
                            <h3 class="card-title">Customer </h3>
                        </div>
                        <div>
                            <div class="info-box ">

                                <span class="info-box-icon bg-success"><?php $x =  mb_substr($orderdetails->customers_name, 0, 2);
                                                                        echo strtoupper($x); ?></span>
                                <h5 class=" p-1">{{$orderdetails->customers_name}}</h5>






                            </div>
                            <p>Email:{{$orderdetails->email}}</p>
                            <p>telephone:{{$orderdetails->customers_telephone}}</p>



                            <div class="card">
                                <div class="p-2">
                                    <h4>Shipping address : </h4>
                                    <div>
                                        <p class="m-o p-o">{{$orderdetails->billing_street_address}},<br>{{$orderdetails->billing_suburb}},<br>{{$orderdetails->billing_city}},<br>{{$orderdetails->billing_postcode}},<br>{{$orderdetails->billing_state}},<br>{{$orderdetails->billing_country}}.</p>
                                    </div>
                                    <h4>biliing address:</h4>
                                    <div>
                                        <p class="m-o p-o">same as shipping address.</p>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>

@endsection
@section ('js')

<script src="{{asset('assets/libs/isotope-layout/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('assets/js/pages/gallery.init.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    document.getElementById('order').click();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection