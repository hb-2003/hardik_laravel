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
                    <h1>All order </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Order ID</th>
                                        <th>User Id</th>
                                        <th>Billing Name</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>View Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userorders as $key => $userorder)
                                    <tr>

                                        <td><a href="javascript: void(0);" class="text-body fw-bold">{{$userorder->id}}</a> </td>
                                        <td>{{$userorder->customers_id}}</td>
                                        <td>{{$userorder->customers_name}}</td>
                                        <td>
                                            {{$userorder->created_at}}
                                        </td>
                                        <td>
                                            {{$userorder->order_price}}
                                        </td>
                                        <td>
                                            @if($userorder->status == "0")
                                            <span class="badge badge-warning">padding</span>
                                            @elseif($userorder->status == "1")
                                            <span class="badge badge-success">Confirm</span>
                                            @else
                                            <span class="badge badge-danger">refund</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if($userorder->pyment_type == "pay")
                                            <i class="fab fa-cc-paypal me-1"></i> Paypal
                                            @elseif($userorder->pyment_type == "cas")
                                            <i class="fas fa-money-bill-alt me-1"></i> COD
                                            @else
                                            <i class="fab fa-cc-visa me-1"></i> Visa
                                            @endif
                                        </td>
                                    
                                        <td><a href="{{route('admin.orderdetail',$userorder->id)}}">view detail</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
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