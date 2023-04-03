@extends('layouts.frontend.app')

@section('title', ' all products')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <h5>All categories </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-inline float-md-end">
                                            <div class="search-box ms-2">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control bg-light border-light rounded" placeholder="Search...">
                                                    <i class="bx bx-search search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="produt" role="tabpanel">
                                        <div class="row">
                                            @foreach($products as $product)
                                            <div class="col-xl-4 col-sm-6">
                                                <div class="card dash-product-box shadow-none border text-center">
                                                    <a href="{{route('productdetail',$product->id)}}">
                                                        <div class="card-body">

                                                            <div class="dash-product-img">
                                                                <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" width="75%" alt="">
                                                            </div>
                                                            <h5 class="font-size-17 mt-1">
                                                                <a href="#" class="text-dark lh-base"><?php echo $small = substr($product->products_name, 0, 25); ?> </a>
                                                            </h5>
                                                            <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1">₹{{$product->products_price*110/100}}</del>₹{{$product->products_price}}</h5>
                                                            <h6 class="p-3">FREE Delivery by Vuesy Funichar.</h6>
                                                            <div class="mt-4">
                                                                <a href="{{route('productdetail',$product->id)}}" class="btn btn-primary btn-sm w-lg"><i class="bx bx-cart me-1 align-middle"></i> see detail</a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
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