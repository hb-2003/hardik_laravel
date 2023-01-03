@extends('layouts.user.app')
@section('title', 'content')

@section('css')
<link href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('style')
@endsection

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-8 ">
                    <div class="card" style="width: 100%;">
                        <!-- <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Default Swiper</h4>
                        </div>end card header -->
                        <div class="card-body ">
                            <div class="swiper-container keyboard-control" dir="ltr">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">

                                        <img src="{{ asset('images\home\sofa.jpg')}}" class="img-fluid mx-auto d-block" alt>
                                    </div>


                                    <div class="swiper-slide">

                                        <img src="{{ asset('images\home\tabel.jpg')}}" class="img-fluid mx-auto d-block" alt>


                                    </div>
                                    <div class="swiper-slide">

                                        <img src="{{ asset('images\home\chear.jpg')}}" class="img-fluid mx-auto d-block" alt>


                                    </div>
                                    <div class="swiper-slide">

                                        <img src="{{ asset('images\home\bad.jpg')}}" class="img-fluid mx-auto d-block" alt>


                                    </div>
                                </div><!-- end swiper wrapper -->
                            </div><!-- end swiper container -->
                        </div><!-- end card body -->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="width: 108%;">
                        <div class="card-body ">
                            <img src="{{asset('images/home/empty-modern-room-with-furniture.jpg') }}" class="img-fluid  d-block" alt>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
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
                                                    <div class="card-body">
                                                        <div class="pricing-badge">
                                                            <span class="badge bg-danger">InActive</span>
                                                        </div>
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

                                                        <div class="mt-4">
                                                            <a href="#" class="btn btn-primary btn-sm w-lg"><i class="bx bx-cart me-1 align-middle"></i> Buy
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @elseif($product['products_status']=="0")

                                            <div class="col-xl-4 col-sm-6">
                                                <div class="card dash-product-box shadow-none border text-center">
                                                    <a href="{{route('user.productdetail',$product->id)}}">
                                                        <div class="card-body">
                                                            <div class="pricing-badge">
                                                                <span class="badge bg-success">Active</span>
                                                            </div>
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

                                                            <div class="mt-4">
                                                                <a href="#" class="btn btn-primary btn-sm w-lg"><i class="bx bx-cart me-1 align-middle"></i> Buy
                                                                    Now</a>
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
            </div> -->
            <div>
                <h5 class="" style="text-align: center;"> Top Picks For You
                </h5>
            </div>

            <div>
                <h6 class="" style="text-align: center;">Impressive Collection For Your Dream Home
                </h6>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Categorie</h4>
                            <a href="" class="d-flex">view all</a>
                        </div>
                        <div class="card-body align-items-center">

                            <div class="row container-fluid">
                                @foreach($categories as $categorie)
                                <div class="col-lg-2 container">
                                    <div>
                                        <img src="{{asset('images/categorie/'.$categorie->categorie_image) }}" class="avatar-xl" alt>
                                        <p class="p-3">{{$categorie ->categorie_name}}</p>
                                    </div>
                                </div><!-- end swiper-slide -->
                                @endforeach

                            </div><!-- end swiper wrapper -->

                        </div><!-- end card body -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Responsive Breakpoints</h4>
                            <a href="" class="d-flex">view all</a>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="swiper-container responsive-swiper" dir="ltr">
                                <div class="swiper-wrapper">
                                    @foreach($productssliders as $productsslider)
                                    <div class="swiper-slide">
                                        <div>
                                            <img src="{{asset('images/product/'.$productsslider->productimage[0]->name) }}" class="img-fluid mx-auto d-block" alt>

                                        </div>
                                    </div><!-- end swiper-slide -->
                                    @endforeach

                                </div><!-- end swiper wrapper -->

                                <div class="swiper-pagination"></div>
                            </div><!-- end swiper container -->
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div>






    @endsection
    @section('js')

    <!-- swiper js -->
    <script src=" {{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

    <!-- notification init -->
    <script src=" {{asset('assets/js/pages/swiper-slider.init.js')}}"></script>
    @endsection