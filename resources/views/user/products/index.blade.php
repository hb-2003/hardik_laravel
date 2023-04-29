@extends('layouts.user.app')

@section('title', ' all products')

@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/nouisliderribute/nouislider.min.css')}}">
<style>
    .hidden {
        display: none;
    }
</style>
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
                        <form method="POST" action="{{route('user.product')}}" class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            <div class="p-4">
                                <h5 class="font-size-15 mb-3">Categories</h5>
                                <div class="custom-accordion">

                                    <div class="collapse show" id="categories-collapse">
                                        <div class="card p-2 border shadow-none mb-1">
                                            <ul class="list-unstyled categories-list mb-0">
                                                @foreach($categories as $categorie)
                                                <li>
                                                    <input class="form-check-input" name="category[]" multiple value="'{{$categorie->categorie_name}}'" type="checkbox" id="formCheck1">
                                                    <label class="form-check-label" for="formCheck1">
                                                        {{$categorie->categorie_name}}
                                                    </label>
                                                </li>



                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="p-4 border-top">
                                <div>
                                    <h5 class="font-size-15 mb-3">Price</h5>
                                    <div id="priceslider" class="mb-4">

                                    </div>
                                </div>

                            </div>

                            <div class="custom-accordion">
                                @foreach($attributes as $key => $attribute)
                                <div class="p-4 border-top">
                                    <div>
                                        <h5 class="font-size-15 mb-0"><a href="#filterprodductcolor-collapse" class="text-dark d-block" data-bs-toggle="collapse">{{$attribute->name}} <i class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                                        <div class="collapse show" id="filterprodductcolor-collapse">
                                            <div class="mt-4">
                                                @foreach($attribute ->attributevalue as $attributevlaue)
                                                <div class="form-check mt-2">
                                                    <input type="checkbox" name="attributevalue[]" multiple value="'{{$attributevlaue->name}}'" class="form-check-input" id="productcolorCheck1">
                                                    <label class="form-check-label" for="productcolorCheck1"> {{$attributevlaue->name }}</label>
                                                </div>

                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                <div class="m-3 mb-5">
                                    <button type="submit" class="btn btn-primary float-md-end">Apply</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div> -->

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <h5>Showing Result For "Furniture"</h5>
                                            <!-- <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Manufacture</a></li>
                                                <li class="breadcrumb-item active">Furniture</li>
                                            </ol> -->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-inline float-md-end">
                                            <div class="search-box ms-2">
                                             
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
                                                            <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" alt="" width="100%">
                                                        </div>

                                                        <h5 class="font-size-17 mt-1">
                                                            <a href="#" class="text-dark lh-base"><?php echo $small = substr($product->products_name, 0, 20); ?></a>
                                                        </h5>

                                                        <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1"> @if($product->Products_categorie == 3)
                                                                ₹{{$product ->sale_price}}
                                                                @endif</del> ₹{{$product ->products_price}}</h5>
                                                        <div class="mt-4">
                                                            <a href="{{route('user.productdetail',$product->id)}}" class="btn btn-primary btn-sm w-lg"><i class="bi bi-ticket-detailed"></i> See Detail
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
                                        <ul class="pagination pagination-rounded mb-sm-0">
                                            {{ $products->onEachSide(5)->links() }}
                                        </ul>
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
<!-- nouisliderribute js -->
<script src="{{asset('assets/libs/nouisliderribute/nouislider.min.js')}}"></script>
<script src="{{asset('assets/libs/wnumb/wNumb.min.js')}}"></script>


<!-- init js -->
<script src="{{asset('assets/js/pages/product-filter-range.init.js')}}"></script>
@endsection