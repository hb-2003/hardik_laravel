<?php

use App\Models\Review;

?>
@extends('layouts.frontend.app')

@section('title', ' all products')

@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/nouisliderribute/nouislider.min.css')}}">
@endsection

@section('style')
@endsection

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom">
                            <h5 class="mb-0">Filters</h5>
                        </div>

                        <div class="p-4">
                            <h5 class="font-size-15 mb-3">Categories</h5>
                            <div class="custom-accordion">

                                <div class="collapse show" id="categories-collapse">
                                    <div class="card p-2 border shadow-none mb-1">
                                        <ul class="list-unstyled categories-list mb-0">
                                            @foreach($categories as $categorie)
                                            <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> {{$categorie->categorie_name}}</a></li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="p-4 border-top">
                            <div>
                                <h5 class="font-size-15 mb-3">Price</h5>
                                <div id="priceslider" class="mb-4"></div>
                            </div>
                        </div>

                        <div class="custom-accordion">
                            <div class="p-4 border-top">
                                <div>
                                    <h5 class="font-size-15 mb-0"><a href="#filtersizes-collapse" class="text-dark d-block" data-bs-toggle="collapse">Sizes <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                    <div class="collapse show" id="filtersizes-collapse">
                                        <div class="mt-4">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-15 mb-0">Select Sizes</h5>
                                                </div>
                                                <div class="w-xs">
                                                    <select class="form-select">
                                                        <option value="1">3</option>
                                                        <option value="2">4</option>
                                                        <option value="3">5</option>
                                                        <option value="4">6</option>
                                                        <option value="5" selected>7</option>
                                                        <option value="6">8</option>
                                                        <option value="7">9</option>
                                                        <option value="8">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            @foreach($attributes as $key => $attribute)
                            <div class="p-4 border-top">
                                <div>
                                    <h5 class="font-size-15 mb-0"><a href="#filterprodductcolor-collapse" class="text-dark d-block" data-bs-toggle="collapse">{{$attribute->name}} <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                    <div class="collapse show" id="filterprodductcolor-collapse">
                                        <div class="mt-4">
                                            @foreach($attribute ->attributevalue as $attributevlaue)
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="productcolorCheck1">
                                                <label class="form-check-label" for="productcolorCheck1"><i class="mdi mdi-circle text-dark mx-1"></i> {{$attributevlaue->name }}</label>
                                            </div>

                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach





                        </div>

                    </div>
                </div> -->

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <h5>Showing result for "Furniture"</h5>
                                            <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                
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

                                <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                                    <li class="nav-item">
                                        <a class="nav-link disabled fw-medium" href="#" tabindex="-1">Sort by:</a>
                                    </li>
                                    <li class="nav-item">

                                        <a class="nav-link active" data-bs-toggle="tab" href="#all">All</a>
                                    </li>

                                    @foreach($categories as $categorie)
                                    <li class="nav-item">

                                        <a class="nav-link " data-bs-toggle="tab" href="#pro{{$categorie->id}}"> <?php echo ucwords($categorie->categorie_name);?></a>
                                    </li>
                                    @endforeach

                                    
                                </ul>

                                <!-- Tab panes -->
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
                                                            <a href="#" class="btn btn-primary btn-sm w-lg"><i class="mdi mdi-cart me-1 align-middle"></i> Buy
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
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
                                        <!-- <ul class="pagination pagination-rounded mb-sm-0">
                                        {{ $products->onEachSide(5)->links()  }}
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <h2>All Product</h2>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-3 pt-2">
                                        <div>
                                            <h5>Showing result for </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex flex-wrap align-items-start justify-content-md-end gap-2 mb-2">
                                            <div class="search-box ">
                                                <div class="position-relative">
                                                    <form class="" method="POST" action="{{ route('product') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="serch" class="form-control bg-light border-light rounded" placeholder="Search...">
                                                        <i class="uil uil-search search-icon"></i>
                                                    </form>
                                                </div>
                                            </div>



                                        </div>

                                    </div>


                                </div>
                                <hr>


                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="produt" role="tabpanel">
                                        <div class="row">
                                            @foreach($products as $product)
                                            <div class="col-xl-3 col-sm-4">
                                                <div class="card dash-product-box shadow-none border text-center">
                                                    <a href="{{route('productdetail',$product->id)}}">
                                                        <div class="card-body">
                                                            <div class="dash-product-img">
                                                                <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" width="75%" alt="">
                                                            </div>

                                                            <h5 class="font-size-17 mt-1">
                                                                <a href="#" class="text-dark lh-base">{{$product->products_name}}</a>
                                                            </h5>
                                                            <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1">₹{{$product->products_price*110/100}}</del> ₹{{$product->products_price}}</h5>
                                                            <h6 class="p-3">FREE Delivery by Vuesy Funichar.</h6>
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
            </div> -->
        </div>
    </div>
</div>

@endsection

@section('js')
<!-- nouisliderribute js -->
<script src="{{asset('assets/assets/libs/nouisliderribute/nouislider.min.js')}}"></script>
<script src="{{asset('assets/assets/libs/wnumb/wNumb.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('assets/assets/js/pages/product-filter-range.init.js')}}"></script>
@endsection