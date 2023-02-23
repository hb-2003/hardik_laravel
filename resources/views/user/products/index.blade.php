@extends('layouts.user.app')

@section('title', ' all products')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <h2>All Product</h2>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <h5>Showing result for </h5>
                                            <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                                <li class="breadcrumb-item active"></li>
                                            </ol>
                                        </div>
                                    </div>

                                    
                                </div>


                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="produt" role="tabpanel">
                                        <div class="row">
                                            @foreach($products as $product)
                                            @if($product['products_status']=="1")

                                            <div class="col-xl-4 col-sm-6">
                                                <div class="card dash-product-box shadow-none border text-center">
                                                    <a href="{{route('user.productdetail',$product->id)}}">
                                                        <div class="card-body">

                                                            <div class="dash-product-img">
                                                                <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" width="75%" alt="">
                                                            </div>

                                                            <h5 class="font-size-17 mt-1">
                                                                <a href="#" class="text-dark lh-base">{{$product->products_name}}</a>
                                                            </h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            @elseif($product['products_status']=="0")

                                            <div class="col-xl-4 col-sm-6">
                                                <div class="card dash-product-box shadow-none border text-center">
                                                    <a href="{{route('user.productdetail',$product->id)}}">
                                                        <div class="card-body">

                                                            <div class="dash-product-img">
                                                                <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" width="75%" alt="">
                                                            </div>

                                                            <h5 class="font-size-17 mt-1">
                                                                <a href="#" class="text-dark lh-base">{{$product->products_name}}</a>
                                                            </h5>

                                                            <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1">₹{{$product->products_price*110/100}}</del> ₹{{$product->products_price}}</h5>

                                                            <h6 class="p-3">FREE Delivery by Vuesy Furniture</h6>

                                                           
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-7">
                                        <div class="float-sm-end">
                                            {{ $products->onEachSide(5)->links() }}
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
@endsection