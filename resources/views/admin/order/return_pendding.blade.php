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
                    <h1>Return pendding order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Return</li>
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
                                        <th>Reason</th>
                                        <th>View Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($returnpenddings as $key => $returnpendding)
                                    <tr>

                                        <td>
                                            <a href="javascript: void(0);" class="text-body fw-bold">{{$returnpendding->id}}</a>
                                        </td>
                                        <td>{{$returnpendding->customers_id}}</td>
                                        <td>{{$returnpendding->customers_name}}</td>
                                        <td>
                                            {{$returnpendding->created_at}}
                                        </td>
                                        <td>
                                            {{$returnpendding->order_price}}
                                        </td>
                                        <td>
                                            @if($returnpendding->status == "0")
                                            <span class="badge badge-info bg-primary">padding</span>
                                            @elseif($returnpendding->status == "1")
                                            <span class="badge badge-info bg-success">success</span>
                                            @else
                                            <span class="badge badge-info bg-danger">refund</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if($returnpendding->pyment_type == "pay")
                                            <i class="fab fa-cc-paypal me-1"></i> Paypal
                                            @elseif($returnpendding->pyment_type == "cas")
                                            <i class="fas fa-money-bill-alt me-1"></i> COD
                                            @else
                                            <i class="fab fa-cc-visa me-1"></i> Visa
                                            @endif

                                        </td>
                                        <td>{{$returnpendding->return_reason}}</td>

                                        <td>
                                            <a href="{{route('admin.orderdetail',$returnpendding->id)}}">view detail</a>
                                            
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.confirmreturn',$returnpendding->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success">
                                                    return
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection