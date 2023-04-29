<?php

use App\Models\Review;
?>
@extends('layouts.frontend.app')
@section('title', 'content')

@section('css')
<link href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('style')
@endsection

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid " src="{{asset('images/sliderimages/5251238.jpg')}}" style="width: 100%; height: 500px;" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid " src="{{asset('images/sliderimages/6472846.jpg')}}" style="width: 100%; height: 500px;" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid " src="{{asset('images/sliderimages/illustration-living-room-interior_252025-49605.jpg')}}" style="width: 100%; height: 500px;" alt="Second slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" srole="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div><!-- end card body -->
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="row">
                        <div class="p-1">
                            <h4 class="" style="text-align: center;"> Top Picks For You
                            </h4>
                        </div>
                        <div>
                            <h5 class="" style="text-align: center;">Impressive Collection For Your Dream Home </h5>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Categorie</h4>
                                        <!-- <a href="" class="d-flex">view all</a> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="swiper-container responsive-swiper" dir="ltr">
                                            <div class="swiper-wrapper">
                                                @foreach($categories as $categorie)
                                                <div class="swiper-slide">

                                                    <img src="{{asset('images/categorie/'.$categorie->categorie_image) }}" class="img-fluid mx-auto d-block" width="100%" height="100%" alt>

                                                </div><!-- end swiper-slide -->

                                                @endforeach <!-- end swiper-slide -->
                                            </div><!-- end swiper wrapper -->
                                            <div class="swiper-arrow">
                                                <div class="swiper-button-next"><i class="bx bx-right-arrow"></i></div>
                                                <div class="swiper-button-prev"><i class="bx bx-left-arrow"></i></div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div><!-- end swiper container -->
                                    </div><!-- end card body -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="p-1">
                            <h4 class="" style="text-align: center;"> Their Words, Our Pride
                            </h4>
                        </div>
                        <div>
                            <h5 class="" style="text-align: center;">Happy Words of our Happy Customers</h5>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <h5>Showing result for "Furniture"</h5>
                                                                <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                        
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
                                                    <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                                                        <li class="nav-item">
                                                            <a class="nav-link disabled fw-medium" href="#" tabindex="-1">Sort by:</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab" href="#all">All</a>
                                                        </li>
                                                        @foreach($categories as $categorie)
                                                        <li class="nav-item">
                                                            <a class="nav-link " data-bs-toggle="tab" href="#pro{{$categorie->id}}">
                                                                <?php echo ucwords($categorie->categorie_name); ?></a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content p-3 text-muted">
                                                        <div class="tab-pane active" id="all" role="tabpanel">
                                                            <div class="row">
                                                                @foreach( $products as $product)
                                                                <div class="col-xl-4 col-sm-6">
                                                                    <div class="card dash-product-box shadow-none border text-center" width="150px">
                                                                        <div class="card-body">
                                                                            <div class="pricing-badge">
                                                                                @if($product->Products_categorie == 1)
                                                                                <span class="badge bg-success">New</span>
                                                                                @elseif($product->Products_categorie == 2)
                                                                                <span class="badge bg-Primary"> Old</span>
                                                                                @else($product->Products_categorie == 3)
                                                                                <span class="badge " style="background-color: rgb(243, 78, 78);"> Sale</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="dash-product-img">
                                                                                <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" alt="">
                                                                            </div>
                                                                            <h5 class="font-size-17 mt-1">
                                                                                <a href="#" class="text-dark lh-base"><?php echo $small = substr($product->products_name, 0, 20); ?></a>
                                                                            </h5>
                                                                            <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1"> @if($product->Products_categorie == 3)
                                                                                    ₹{{$product ->sale_price}}
                                                                                    @endif</del> ₹{{$product ->products_price}}</h5>
                                                                            <div class="mt-4">
                                                                                <a href="{{route('productdetail',$product->id)}}" class="btn btn-primary btn-sm w-lg"><i class="bi bi-ticket-detailed"></i> See Detail
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @foreach($categories as $categorie)

                                                        <div class="tab-pane " id="pro{{$categorie->id}}" role="tabpanel">
                                                            <div class="row">
                                                                @foreach( $products as $product)
                                                                @if($categorie->categorie_name == $product->products_type)

                                                                <div class="col-xl-4 col-sm-6">
                                                                    <a href="{{route('productdetail',$product->id)}}">
                                                                        <div class="card dash-product-box shadow-none border text-center" height="150px">
                                                                            <div class="card-body">
                                                                                <div class="pricing-badge">
                                                                                    @if($product->Products_categorie == 1)
                                                                                    <span class="badge bg-success">New</span>
                                                                                    @elseif($product->Products_categorie == 2)
                                                                                    <span class="badge bg-Primary"> Old</span>
                                                                                    @else($product->Products_categorie == 3)
                                                                                    <span class="badge " style="background-color: rgb(243, 78, 78);"> Sale</span>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="dash-product-img">
                                                                                    <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" alt="">
                                                                                </div>
                                                                                <h5 class="font-size-17 mt-1">
                                                                                    <a href="#" class="text-dark lh-base"><?php echo $small = substr($product->products_name, 0, 25); ?></a>
                                                                                </h5>
                                                                                <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1"> @if($product->Products_categorie == 3)
                                                                                        ₹{{$product ->sale_price}}
                                                                                        @endif</del> ₹{{$product ->products_price}}</h5>
                                                                                <div class="mt-4">
                                                                                    <a href="#" class="btn btn-primary btn-sm w-lg"><i class="mdi mdi-cart me-1 align-middle"></i> Buy Now</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <!-- end row -->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="float-sm-end">
                                                            <ul class="pagination pagination-rounded mb-sm-0">
                                                                {{ $products->onEachSide(5)->links() }}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end row -->

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

<!-- swiper js -->
<script src=" {{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>
<!-- notification init -->
<script src=" {{asset('assets/js/pages/swiper-slider.init.js')}}"></script>



@endsection