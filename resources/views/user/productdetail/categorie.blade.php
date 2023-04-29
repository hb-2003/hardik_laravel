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
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <h5>Showing Result For "{{$name}}"</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="produt" role="tabpanel">
                                        <div class="row">
                                            @foreach($products as $product)
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
<!-- swiper js -->
<script src=" {{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>
<!-- notification init -->
<script src=" {{asset('assets/js/pages/swiper-slider.init.js')}}"></script>
@endsection