@extends('layouts.user.app')
@section('title', 'content')

@section('css')
@endsection

@section('style')
@endsection

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-8">

                    @foreach($cartdetails as $cartdetail)
                    
                    <div class="card border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-start border-bottom pb-3">
                                <div class="me-4">
                                    <img src="{{asset('images/product/'.$cartdetail->productimage[0]->name)}}" alt="" class="avatar-lg">
                                </div>
                                <div class="flex-grow-1 align-self-center overflow-hidden">
                                    <div>
                                        <h5 class="text-truncate font-size-17"><a href="ecommerce-product-detail-2.html" class="text-dark">{{$cartdetail->product[0]->products_name}}</a></h5>
                                        <p class="mb-1">Color : <span class="fw-medium text-muted">{{$cartdetail->product[0]->attributes_set}}</span></p>
                                        <p>Size : <span class="fw-medium">08</span></p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <ul class="list-inline mb-0 font-size-16">
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted px-1">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted px-1">
                                                <i class="mdi mdi-heart-outline"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div>
                                <div class="row align-items-end">
                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <p class="text-muted mb-2">Price</p>
                                            <h5 class="font-size-16 mb-0">{{$cartdetail->product_price}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <p class="text-muted mb-2">Quantity</p>
                                            <div class="d-inline-flex">
                                            <h5 class="font-size-16 mb-0">{{$cartdetail->quantity}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mt-3">
                                            <p class="text-muted mb-2">Total</p>
                                            <h5 class="font-size-16 mb-0">{{$cartdetail->quantity *$cartdetail->product_price  }} </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    <!-- end card -->


                    <!-- end card -->

                    <div class="row my-4">
                        <div class="col-sm-6">
                            <a href="{{route('user.dashboard')}}" class="btn btn-link">
                                <i class="bx bx-arrow-left me-1"></i> Continue Shopping </a>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-sm-end mt-2 mt-sm-0">
                                <a href="ecommerce-checkout.html" class="btn btn-success">
                                    <i class="mdi mdi-cart-outline me-1"></i> Checkout </a>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                </div>

                <div class="col-xl-4">
                    <div class="mt-5 mt-lg-0">
                        <div class="card border shadow-none">
                            <div class="card-header bg-transparent border-bottom py-3 px-4">
                                <h5 class="font-size-16 mb-0">Order Summary <span class="float-end">#MN0124</span></h5>
                            </div>
                            <div class="card-body p-4 pt-2">

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total :</td>
                                                <td class="text-end">$ {{$total}}</td>
                                            </tr>
                                          
                                            <tr>
                                                <td>Shipping Charge :</td>
                                                <td class="text-end">$ 0</td>
                                            </tr>
                                            <tr>
                                                <td>Estimated Tax : </td>
                                                <td class="text-end">$ 0</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>Total :</th>
                                                <td class="text-end">
                                                    <span class="fw-bold">
                                                        $ {{$total}}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
@endsection

@section('js')

@endsection