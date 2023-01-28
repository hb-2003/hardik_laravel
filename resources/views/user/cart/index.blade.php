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

            @if($count == 0)
            <div class="row">
                <div class="col-xl-12">


                    <div class="card card-body">
                        <h1 class="mb-1">Your Vusey Cart is empty.</h1>
                        <p class="card-text">Your shopping cart is waiting. Give it purpose – fill it with household supplies,.
                            Continue shopping on the <a href="{{route('user.dashboard')}}" class="link">Vusey.com.homepage</a> learn about today's deals, or visit your Wish List.</p>


                    </div>
                </div>
                <div class="row my-6">
                    <div class="col-sm-6">
                        <a href="javascript:history.back()" class="link">
                            <i class="bx bx-arrow-left me-1"></i> Continue Shopping </a>
                    </div> <!-- end col -->
                    <!-- end col -->
                </div> <!-- end row-->


            </div>


            @else
            <div class="row">
                <div class="col-xl-9">

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
                                            <h4>
                                                <a href="{{route('user.cartdelete',$cartdetail->id)}}" class="text-muted px-1">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </h4>
                                        </li>
                                        <!-- <li class="list-inline-item">
                                            <a href="#" class="text-muted px-1">
                                                <i class="bx bx-heart"></i>
                                            </a>
                                        </li> -->
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
                                    <!-- <div class="col-md-3">
                                        <div class="mt-3">
                                            <a href="{{route('user.cartdelete',$cartdetail->id)}}" class="btn btn-danger">
                                                <i class="bx bx-arrow-left me-1"></i> delete </a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    <!-- end card -->


                    <!-- end card -->

                    <div class="row my-6">
                        <div class="col-sm-6">
                            <a href="javascript:history.back()" class="link">
                                <i class="bx bx-arrow-left me-1"></i> Continue Shopping </a>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-sm-end mt-2 mt-sm-0">
                                <a href="{{route('user.checkout')}}" class="btn btn-primary">
                                    <i class="bx bx-cart-outline me-1"></i> Checkout </a>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                </div>

                <div class="col-xl-3">
                    <div class="mt-5 mt-lg-0">
                        <div class="card border shadow-none">
                            <div class="card-header bg-transparent border-bottom py-3 px-4">
                                <h5 class="font-size-16 mb-0">Order detail <span class="float-end"></span></h5>
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
            @endif
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
@endsection

@section('js')

@endsection