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
                <div class="col-xl-12 ">
                    <div class="" style="width: 100%;">
                        <!-- <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Default Swiper</h4>
                        </div>end card header -->
                        <div class="card-body ">
                            <div class="swiper-container keyboard-control" dir="ltr">


                                <img src="https://ii1.pepperfry.com/media/wysiwyg/banners/Web_Furniture_Banner_2x_06Dec.jpg" class="img-fluid mx-auto d-block" alt>
                            </div>


                            <!-- <div class="swiper-slide">

                                        <img src="{{ asset('images\home\tabel.jpg')}}" class="img-fluid mx-auto d-block" alt>


                                    </div>
                                    <div class="swiper-slide">

                                        <img src="{{ asset('images\home\chear.jpg')}}" class="img-fluid mx-auto d-block" alt>


                                    </div>
                                    <div class="swiper-slide">

                                        <img src="{{ asset('images\home\bad.jpg')}}" class="img-fluid mx-auto d-block" alt>


                                    </div> -->

                        </div><!-- end card body -->
                    </div>
                </div>
                <!-- <div class="col-xl-4">
                    <div class="card" style="width: 108%;">
                        <div class="card-body ">
                            <img src="{{asset('images/home/empty-modern-room-with-furniture.jpg') }}" class="img-fluid  d-block" alt>
                        </div>
                    </div>
                </div> -->
            </div>
           
            <div>
                <h5 class="pt-3" style="text-align: center;"> Top Picks For You
                </h5>
            </div>

            <div>
                <h6 class="pb-3" style="text-align: center;">Impressive Collection For Your Dream Home
                </h6>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Categorie</h4>
                            <!-- <a href="" class="d-flex">view all</a> -->
                        </div>
                        <div class="card-body">

                            <div class="row ">
                                @foreach($categories as $categorie)

                                <div class="col-lg-2">
                                    <a href="{{route('user.categorie',$categorie->categorie_name)}}">
                                        <img src="{{asset('images/categorie/'.$categorie->categorie_image) }}" class="" width="150px" alt cl> </a>
                                    <p class="p-2">{{$categorie ->categorie_name}}</p>
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
                            <h4 class="card-title">New products</h4>
                            <a href="{{route('user.allproduct')}}" class="d-flex">view all</a>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="row">

                                @foreach($productssliders as $productsslider)
                                <div class="col-lg-2" align-items-center>
                                    <a href="{{route('user.productdetail',$productsslider->id)}}">
                                        <img src="{{asset('images/product/'.$productsslider->productimage[0]->name) }}" class="img-fluid mx-auto d-block" alt>
                                        <p class="mt-2 mb-lg-0 mr-5" style="color: black;">{{$productsslider->products_name}}</p>

                                    </a>
                                </div><!-- end swiper-slide -->
                                @endforeach
                            </div>

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