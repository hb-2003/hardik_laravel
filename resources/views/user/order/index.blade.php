@extends('layouts.user.app')
@section('title', 'content')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('style')
@endsection

@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Billing Name</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>View Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userorders as $key => $userorder)
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body fw-bold">{{$userorder->id}}</a> </td>
                                        <td>{{$userorder->customers_name}}</td>
                                        <td>
                                            {{$userorder->created_at}}
                                        </td>
                                        <td>
                                            {{$userorder->order_price}}
                                        </td>
                                        <td>
                                            @if($userorder->status == "0")
                                            <span class="badge badge-pill badge-soft-success font-size-12">padding</span>
                                            @elseif($userorder->status == "1")
                                            <span class="badge badge-pill badge-soft-primary font-size-12">success</span>
                                            @else
                                            <span class="badge badge-pill badge-soft-danger font-size-12">refund</span>
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
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#order_{{$key + 1}}">
                                                View Details
                                            </button>
                                            <div class="modal fade {{$key + 1}}" id="order_{{$key + 1}}" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="orderdetailsModalLabel">Order Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-2">Product id: <span class="text-primary">{{$userorder->id}}</span></p>
                                                            <p class="mb-4">Billing Name: <span class="text-primary">Marie N.</span></p>

                                                            <div class="table-responsive">
                                                                <table class="table align-middle table-nowrap">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Product</th>
                                                                            <th scope="col">Product Name</th>
                                                                            <th scope="col">Price</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($userorder->order_product as $product)
                                                                        <tr>
                                                                            <th scope="row">
                                                                                <div>
                                                                                    <img src="{{asset('images/product/'.$product->products_image)}}" alt="" class="avatar-lg">
                                                                                </div>
                                                                            </th>
                                                                            <td>
                                                                                <div>
                                                                                    <h5 class="text-truncate font-size-16">{{$product->products_name}}</h5>
                                                                                    <p class="text-muted mb-0">₹ {{$product->products_price}} * {{$product ->products_quantity}}</p>
                                                                                </div>
                                                                            </td>
                                                                            <td>₹ {{$product->products_price}}</td>
                                                                        </tr>
                                                                        @endforeach
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                                                            </td>
                                                                            <td>
                                                                                ₹ {{$userorder->order_price}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h6 class="m-0 text-right">Shipping:</h6>
                                                                            </td>
                                                                            <td>@if($userorder->shipping_method == 0)
                                                                                Free
                                                                                @else
                                                                                ₹50
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h6 class="m-0 text-right">Total:</h6>
                                                                            </td>
                                                                            <td>
                                                                                ₹{{$userorder->order_price}}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($userorder->order_status == 0)
                                            <div class="d-flex gap-3">

                                                <a href="{{ route('user.cansal',$userorder->id)}}" class="text-danger"><i class="bx bxs-trash   font-size-18"></i></a>
                                            </div>
                                            @elseif($userorder->order_status == 1)
                                            <div class="d-flex gap-3">

                                                ` <!-- <a href="{{ route('user.orderreorder',$userorder->id)}}" class="btn btn-primary">Reorder</a>` -->
                                                <a href="{{ route('user.orderreturn',$userorder->id)}}" class="btn btn-danger">return</a>
                                            </div>
                                            @elseif($userorder->order_status == 2)
                                            <div class="d-flex gap-3">
                                                <h6>Censal Order</h6>
                                                <!-- <a href="{{ route('user.cansalorderreorder',$userorder->id)}}" class="btn btn-success">Reorder</a> -->
                                            </div>
                                            @elseif($userorder->order_status == 3)
                                            <div class="d-flex gap-3">

                                                <h6> Return Pendding</h6>
                                            </div>

                                            @elseif($userorder->order_status == 5)
                                            <div class="d-flex gap-3">

                                                <h6>Return Complite </h6>
                                            </div>

                                            @else
                                            <div class="d-flex gap-3">

                                                <h6>Confirm your order</h6>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                        <td>Neal Matthews</td>
                                        <td>
                                            07 Oct, 2021
                                        </td>
                                        <td>
                                            $400
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                        </td>
                                        <td>
                                            <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                        </td>
                                        <td>
                                            Button trigger modal
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                                View Details
                                            </button>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a href="javascript:void(0);" class="text-success"><i class="bx bx-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);" class="text-danger"><i class="bx bx-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <a href="{{route('user.account')}}" class="btn btn-danger"> Back</a>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

@endsection

@section('js')


<script src="{{asset('user/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('user/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('user/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('user/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('user/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('user/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('user/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('user/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('user/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('user/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('user/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('user/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('user/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection