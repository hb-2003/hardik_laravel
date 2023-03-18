@extends('layouts.frontend.app')
@section('title', 'content')

@section('css')
<link href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('style')
@endsection

@section('content')

<div class="main-content">
    @if($sliderscount == '0')
    <div class="row">
        <div class="col-xl-12 ">
            <div class="" style="width: 100%;">
                <div class="card-body ">
                    <div class="swiper-container keyboard-control" dir="ltr">
                        <img src="https://ii1.pepperfry.com/media/wysiwyg/banners/Web_Furniture_Banner_2x_06Dec.jpg" class="img-fluid mx-auto d-block" alt>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <!-- <div class="row pt-4">
        <div class="col-xl-12 col-lg-12">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($sliders as $key => $slider)
                    <div class="carousel-item active">
                        <img class="d-block img-fluid mx-auto" src="{{asset('images/slider/'.$slider->name) }}" style="height: 150%;" alt="First_slide_{{$key +1 }}">
                    </div>
                    @endforeach
                </div>
            

                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
              
            </div>

        </div>
    </div> -->
    <div class="row">
        <div class="col-xl-12 ">
            <div class="" style="width: 100%;">
                <div class="card-body ">
                    <div class="swiper-container keyboard-control" dir="ltr">
                        <img src="https://ii1.pepperfry.com/media/wysiwyg/banners/Web_Furniture_Banner_2x_06Dec.jpg" class="img-fluid mx-auto d-block" alt>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="page-content">



        <div class="container-fluid">


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

                            <div class="row ">
                                @foreach($categories as $categorie)

                                <div class="col-lg-2" >
                                    <a href="{{route('categorie',$categorie->categorie_name)}}">
                                        <img src="{{asset('images/categorie/'.$categorie->categorie_image) }}" class="" width="150px" alt cl> </a>
                                    <p class="p-2">{{$categorie ->categorie_name}}</p>
                                </div><!-- end swiper-slide -->

                                @endforeach

                            </div><!-- end swiper wrapper -->

                        </div><!-- end card body -->
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header justify-content-between d-flex align-items-center">
                                <h4 class="card-title">New products</h4>
                                <a href="" class="d-flex">view all</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($productssliders as $productsslider)
                                    <div class="col-lg-2" align-items-center>
                                        <a href="{{route('productdetail',$productsslider->id)}}">
                                            <img src="{{asset('images/product/'.$productsslider->productimage[0]->name) }}" class="img-fluid mx-auto d-block" alt>
                                            <p class="mt-2 mb-lg-0 mr-5">{{$productsslider->products_name}}</p>

                                        </a>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-3">

                                    <h5>All Product</h5>
                                </div><!-- end col -->
                                <div class="col-md-9">
                                    <div class="d-flex flex-wrap align-items-start justify-content-md-end gap-2 mb-2">
                                        <div class="search-box ">
                                            <div class="position-relative">
                                                <form class="" method="POST" action="{{ route('home') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="text" name="serch" class="form-control bg-light border-light rounded" placeholder="Search...">
                                                    <i class="uil uil-search search-icon"></i>
                                                </form>
                                            </div>
                                        </div><!-- end serch box -->



                                    </div>

                                </div><!-- end col -->
                            </div><!-- end row -->

                            <div class="mt-2">
                                <ul class="nav nav-tabs nav-tabs-custom mb-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#grid-all" role="tab">All</a>
                                    </li>

                                    @foreach($categories as $key => $categorie)
                                    <li class="nav-item">
                                        <form action="{{route('home')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{$categorie->id}}">
                                            <button class="nav-link" type="submit" <?php echo $categoriestatus == $categorie->id ? "active" : "" ?>>{{$categorie->categorie_name}}</button>
                                        </form>



                                    </li>
                                    @endforeach

                                </ul><!-- end ul -->
                            </div>

                            <!-- Tab content -->

                            <div class="tab-content">

                                <div class="tab-pane active" id="" role="tabpanel">
                                    <div class="row">
                                        @foreach($products as $product)

                                        <div class="col-xl-3 col-sm-4">
                                            <a href="{{route('productdetail',$product->id)}}">
                                                <div class="card dash-product-box shadow-none border text-center">
                                                    <div class="card-body">
                                                        <div class="pricing-badge">
                                                            <span class="badge bg-success">new</span>
                                                        </div>
                                                        <div class="dash-product-img">
                                                            <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" alt="">
                                                        </div>

                                                        <h5 class="font-size-17 mt-1">
                                                            <a class="text-dark lh-base"> <?php echo $small = substr($product->products_name, 0, 45); ?></a>
                                                        </h5>

                                                        <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1"></del>{{$product ->products_price}}</h5>
                                                        <div class="font-size-16 mt-2">
                                                            <i class="mdi mdi-star text-warning"></i>
                                                            <i class="mdi mdi-star text-warning"></i>
                                                            <i class="mdi mdi-star text-warning"></i>
                                                            <i class="mdi mdi-star-half-full text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        @endforeach
                                    </div><!-- end row -->
                                    <div class="row g-0">
                                        <div class="col-sm-7">
                                            <div class="float-sm-end">
                                                <p hidden> {{ $products->onEachSide(5)->links()  }}</p>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div><!-- end row -->
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

<!-- swiper js -->
<script src=" {{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- notification init -->
<script src=" {{asset('assets/js/pages/swiper-slider.init.js')}}"></script>

<script type="text/javascript">
    function yourFunction(product_id, quantity, price) {
        if (quantity.length > 0) {
            $.ajax({
                url: "{{route('user.cart')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    product_id: product_id,
                    quantity: quantity,
                    price: price,


                },
                success: function(responseData) {


                    window.location.href = `/user/cartdetail`;

                }

            });
        } else {
            alert("please select quantity");
        }
    }

    function review(product_id, reting, detail) {


        if (detail.length > 0) {
            $.ajax({
                url: "{{route('user.review')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    product_id: product_id,
                    reting: reting,
                    detail: detail,


                },
                success: function(responseData) {
                    window.onload;

                }

            });
        } else {
            alert("please fill detail");
        }
    }
</script>
@endsection