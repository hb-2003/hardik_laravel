@extends('layouts.user.app')

@section('title', 'Change Password')

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
                                            @if($product['products_status']=="1")

                                            <div class="col-xl-4 col-sm-6">
                                                <div class="card dash-product-box shadow-none border text-center">
                                                    <a href="{{route('user.productdetail',$product->id)}}">
                                                        <div class="card-body">

                                                            <div class="dash-product-img">
                                                                <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" width="75%" alt="">
                                                            </div>

                                                            <h5 class="font-size-17 mt-1">
                                                                <a href="#" class="text-dark lh-base">Stylish Cricket &amp; Walking Light Weight Shoes</a>
                                                            </h5>

                                                          

                                                            <div class="font-size-16 mt-2">
                                                                <i class="bx bx-star text-warning"></i>
                                                                <i class="bx bx-star text-warning"></i>
                                                                <i class="bx bx-star text-warning"></i>
                                                                <i class="bx bx-star-half-full text-warning"></i>
                                                            </div>

                                                           
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
                                                                <a href="#" class="text-dark lh-base">Stylish Cricket &amp; Walking Light Weight Shoes</a>
                                                            </h5>

                                                            <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1">$280</del> $140.00</h5>

                                                            <div class="font-size-16 mt-2">
                                                                <i class="bx bx-star text-warning"></i>
                                                                <i class="bx bx-star text-warning"></i>
                                                                <i class="bx bx-star text-warning"></i>
                                                                <i class="bx bx-star-half-full text-warning"></i>
                                                            </div>

                                                           
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