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

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th> -->
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
                                    @foreach($userorders as $userorder)
                                    <tr>
                                        <!-- <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td> -->
                                        <td><a href="javascript: void(0);" class="text-body fw-bold">{{$userorder->id}}</a> </td>
                                        <td>{{$userorder->customers_name}}</td>
                                        <td>
                                            {{$userorder->created_at}}
                                        </td>
                                        <td>
                                            {{$userorder->order_price}}
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
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
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                                View Details
                                            </button>
                                            <div class="modal fade orderdetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
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
                                                                                    <p class="text-muted mb-0">$ {{$product->products_price}} * {{$product ->products_quantity}}</p>
                                                                                </div>
                                                                            </td>
                                                                            <td>$ {{$product->products_price}}</td>
                                                                        </tr>
                                                                        @endforeach
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                                                            </td>
                                                                            <td>
                                                                                $ {{$userorder->products_price}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h6 class="m-0 text-right">Shipping:</h6>
                                                                            </td>
                                                                            <td>@if($userorder->shipping_method == 0)
                                                                                Free
                                                                                @else
                                                                                $50
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <h6 class="m-0 text-right">Total:</h6>
                                                                            </td>
                                                                            <td>
                                                                                ${{$userorder->order_price}}
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
                                            <div class="d-flex gap-3">
                                                <a href="javascript:void(0);" class="text-success"><i class="bx bx-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);" class="text-danger"><i class="bx bx-delete font-size-18"></i></a>
                                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection