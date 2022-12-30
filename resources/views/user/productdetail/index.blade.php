@extends('layouts.user.app')
@section('title', 'content')

@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}">

@endsection

@section('style')
@endsection

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{route('user.buyproduct',$product->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="product-detail">

                                            <div class="swiper product-thumbnail-slider rounded border overflow-hidden position-relative">
                                                <input type="hidden" class="product_id" id="productId_{{$product->id}}" value="{{ $product->id }}" readonly>
                                                <div class="swiper-wrapper">
                                                    @foreach($product->productimage as $image)
                                                    <div class="swiper-slide"><img src="{{asset('images/product/'.$image->name) }}" alt="" class="img-fluid d-block" style="width: 500px ;" /></div>
                                                    @endforeach

                                                </div>

                                                <div class="d-none d-md-block">
                                                    <div class="swiper-button-next"><i class='bx bx-right-arrow-alt'></i></div>
                                                    <div class="swiper-button-prev"><i class='bx bx-left-arrow-alt'></i></div>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <div class="swiper product-nav-slider mt-2 overflow-hidden">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide rounded">
                                                            <div class="nav-slide-item">
                                                                <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" alt="" class="img-fluid d-block" />
                                                            </div>
                                                        </div>
                                                        @foreach($product->productimage as $image)
                                                        <div class="swiper-slide">
                                                            <div class="nav-slide-item"><img src="{{asset('images/product/'.$image->name) }}" alt="" class="img-fluid d-block" /></div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row text-center mt-3">
                                                <div class="col-sm-6">
                                                    <div class="d-grid">
                                                        <button type="button" id="btnPost" onclick="yourFunction(document.getElementById('productId_{{$product->id}}').value,document.getElementById('quantitytId_{{$product->id}}').value ,document.getElementById('priceID_{{$product->products_price}}').value)" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                            <i class="bx bx-cart-alt me-2"></i> Add to cart
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="d-grid">
                                                        <!-- <a href="{{route('user.buyproduct',$product->id)}}" class="btn btn-light waves-effect  mt-2 waves-light"><i class="bx bx-shopping-bag me-2"></i>Buy now </a> -->

                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                            Buy
                                                        </button>
                                                        <!-- <button type="button" id="buyproduct" onclick="butproduct(document.getElementById('productId_{{$product->id}}').value,document.getElementById('quantitytId_{{$product->id}}').value ,document.getElementById('priceID_{{$product->products_price}}').value)" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                        <i class="bx bx-cart-alt me-2"></i> Add to cart
                                                    </button> -->

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xl-8">
                                        <div class="mt-4 mt-xl-3 ps-xl-4">
                                            <h5 class="font-size-14"><a href="#" class="text-muted">{{$product->products_type}}
                                                </a>
                                            </h5>
                                            <h5 class="mt-1">
                                                <a href="#" class="text-dark lh-base">{{$product->products_name}}</a>
                                            </h5>

                                            <div class="text-muted">
                                                <span class="badge bg-success font-size-14 me-1"><i class="bx bx-star"></i> 4.2</span> 234 Reviews
                                            </div>

                                            <h5 class="font-size-20 mt-4 pt-2"><del class="text-muted me-2"><?php echo (round($product->products_price * 110 / 100))  ?></del>{{$product->products_price}} <span class="text-danger font-size-14 ms-2">- 10 % Off</span></h5>

                                            <p class="mt-4 text-muted">{{$product->is_current}}</p>

                                            <input type="hidden" class="price" name="price" id="priceID_{{$product->products_price}}" value="{{ $product->products_price }}" readonly>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mt-3">

                                                            <h5 class="font-size-14">Specification :</h5>
                                                            <ul class="list-unstyled product-desc-list text-muted">
                                                                <li><i class="bx bx-circle-medium me-1 align-middle"></i> High Quality</li>
                                                                <li><i class="bx bx-circle-medium me-1 align-middle"></i> Leather</li>
                                                                <li><i class="bx bx-circle-medium me-1 align-middle"></i> All Sizes available</li>
                                                                <li><i class="bx bx-circle-medium me-1 align-middle"></i> 4 Different Color</li>
                                                            </ul>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mt-3">
                                                            <h5 class="font-size-14">Services :</h5>
                                                            <ul class="list-unstyled product-desc-list text-muted">
                                                                <li><i class="bx bx-log-in-circle text-primary me-1"></i> 10 Days Replacement</li>
                                                                <li><i class="bx bx-dollar-circle text-primary me-1"></i> Cash on Delivery available</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">

                                                    <h5 class="font-size-14 mb-3"><i class="bx bx-map-pin font-size-20 text-primary align-middle me-2"></i> Delivery location</h5>

                                                    <div class="d-inline-flex">

                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Enter Delivery pincode ">

                                                            <button class="btn btn-light" type="button">Check</button>

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-7 col-sm-8">
                                                        <div class="product-desc-color mt-3">
                                                            <h5 class="font-size-14">Colors :</h5>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <a href="#" class="active" data-bs-toggle="tooltip" data-bs-placement="top" title="Gray">
                                                                        <div class="product-color-item">
                                                                            <img src="{{asset('assets/images/product/img-1.png')}}" alt="" class="avatar-md">
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Dark">
                                                                        <div class="product-color-item">
                                                                            <img src="{{asset('assets/images/product/img-2.png')}}" alt="" class="avatar-md">
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Purple">
                                                                        <div class="product-color-item">
                                                                            <img src="{{asset('assets/images/product/img-3.png')}}" alt="" class="avatar-md">
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" class="text-primary border-0 p-1" data-bs-toggle="modal" data-bs-target="#color-img">
                                                                        2 + Colors
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>


                                                    <div class="col-lg-5 col-sm-4">
                                                        <div class="mt-3">
                                                            <h5 class="font-size-14 mb-3">Select Quantity :</h5>

                                                            <div class="d-inline-flex">
                                                                <select class="form-select w-sm" name="quantity" id="quantitytId_{{$product->id}}" value="">
                                                                    <option value="">select</option>
                                                                    @for ($i = 0; $i < $product->products_quantity; $i++)
                                                                        @if (10 >= $i)
                                                                        <option value="{{$i}}">{{$i}}</option>
                                                                        @endif
                                                                        @endfor


                                                                </select>
                                                            </div>
                                                            @error('quantity')
                                                            <div class="alert alert-danger">The select quantity .</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="mt-4 pt-3">
                                            <h5 class="font-size-14 mb-3">Reviews : </h5>
                                            <div class="text-muted mb-3">
                                                <span class="badge bg-success font-size-14 me-1"><i class="bx bx-star"></i> 4.2</span> 234 Reviews
                                            </div>
                                            <div class="border py-4 rounded">

                                                <div class="px-4" id="review" data-simplebar style="max-height: 260px;">
                                                    @foreach($productreviews as $productreview)
                                                    <div class="border-bottom pb-3">
                                                        <p class="float-sm-end text-muted font-size-13">{{$productreview->date}}</p>
                                                        <div class="badge bg-success mb-2"></i> @php $rating = $productreview->reting; @endphp

                                                            @foreach(range(1,5) as $i)
                                                            <span class="fa-stack" style="width:1em">
                                                                <i class="far fa-star fa-stack-1x"></i>

                                                                @if($rating >0)
                                                                @if($rating >0.5)
                                                                <i class="fas fa-star fa-stack-1x"></i>
                                                                @else
                                                                <i class="fas fa-star-half fa-stack-1x"></i>
                                                                @endif
                                                                @endif
                                                                @php $rating--; @endphp
                                                            </span>
                                                                 @endforeach
                                                        </div>
                                                        <p class="text-muted mb-4">{{$productreview->detail}}</p>
                                                        <div class="d-flex align-items-start">
                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-15 mb-0">{{$productreview->user_name}}</h5>
                                                            </div>

                                                            <div class="flex-shrink-0">
                                                                <ul class="list-inline product-review-link mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Like"><i class="bx bx-like"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Comment"><i class="bx bx-comment-dots"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    @endforeach

                                                </div>

                                                <div class="px-4">
                                                    <div class="text-end mt-3">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                            Review
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="mt-4 pt-3">
                                            <h5 class="font-size-14 mb-3">Product description: </h5>
                                            <div class="product-desc">
                                                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="desc-tab" data-bs-toggle="tab" href="#desc" role="tab">Description</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="specifi-tab" data-bs-toggle="tab" href="#specifi" role="tab">Specifications</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content border border-top-0 p-4">
                                                    <div class="tab-pane fade" id="desc" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div>
                                                                    <img src="{{asset('assets/images/product/img-6.png')}}" alt="" class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="text-muted">
                                                                    <p>If several languages coalesce, the grammar of the resulting language is more simple and regular</p>
                                                                    <p>It will be as simple as occidental in fact.</p>

                                                                    <div>
                                                                        <ul class="list-unstyled product-desc-list text-muted mb-0">
                                                                            <li><i class="bx bx-circle-medium me-1 align-middle"></i> Sed ut perspiciatis omnis iste</li>
                                                                            <li><i class="bx bx-circle-medium me-1 align-middle"></i> Neque porro quisquam est</li>
                                                                            <li><i class="bx bx-circle-medium me-1 align-middle"></i> Quis autem vel eum iure</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                                        <div class="table-responsive">
                                                            <table class="table table-nowrap mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row" style="width: 50%;"><b>Category :</b></th>
                                                                        <td>{{$product->products_type}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><b>Brand :</b></th>
                                                                        <td>Jalaram</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><b>Color :</b></th>
                                                                        <td>{{$product->attributes_set}}</td>
                                                                    </tr>
                                                                    <!--  -->
                                                                </tbody>
                                                            </table>
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
            </form>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- sample modal content -->
    <div id="color-img" class="modal fade" tabindex="-1" aria-labelledby="color-imgLabel" aria-hidden="true" data-bs-scroll="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="color-imgLabel">Product Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="product-desc-color">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="#" class="active" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gray">
                                    <div class="product-color-item">
                                        <img src="{{asset('assets/images/product/img-1.png')}}" alt="" class="avatar-md">
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Dark">
                                    <div class="product-color-item">
                                        <img src="{{asset('assets/images/product/img-2.png')}}" alt="" class="avatar-md">
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Purple">
                                    <div class="product-color-item">
                                        <img src="{{asset('assets/images/product/img-3.png')}}" alt="" class="avatar-md">
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Sky">
                                    <div class="product-color-item">
                                        <img src="{{asset('assets/images/product/img-4.png')}}" alt="" class="avatar-md">
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Green">
                                    <div class="product-color-item">
                                        <img src="{{asset('assets/images/product/img-5.png')}}" alt="" class="avatar-md">
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="White">
                                    <div class="product-color-item">
                                        <img src="{{asset('assets/images/product/img-6.png')}}" alt="" class="avatar-md">
                                    </div>
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="row">
        <div class="col-xl-4 col-sm-6">


            <div class="card-body">

                <!-- Button trigger modal -->


                <!-- staticBackdrop Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" class="product_id" id="productId_{{$product->id}}" name="productid" value="{{ $product->id }}" readonly>
                                @if($userproductcount == 1)
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Reting
                                        name</label>

                                    <input type="number" id="reting" value="{{$userproductreview->reting}}" class="form-control" name="reting" placeholder="Enter product reting" max="5">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Reting
                                        Detail</label>
                                    <textarea placeholder="Enter a review " class="form-control" id="detail" name="detail">{{$userproductreview->detail}}</textarea>
                                </div>
                                @else

                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Reting
                                        name</label>

                                    <input type="number" id="reting" value="" class="form-control" name="reting" placeholder="Enter product reting" max="5">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-firstname-input">Reting
                                        Detail</label>
                                    <textarea placeholder="Enter a review " value="" class="form-control" id="detail" name="detail"></textarea>
                                </div>

                                @endif
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="review(document.getElementById('productId_{{$product->id}}').value,document.getElementById('reting').value,document.getElementById('detail').value)" data-bs-dismiss="modal" class="btn btn-primary">submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end modalbody -->

                    <!-- end modalfooter -->
                </div>
            </div>
        </div><!-- end modal -->
    </div> <!-- end cardbody -->
    <!-- end card -->
</div>
</div>

</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

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


                    $('#cartcount').html(responseData['cartscount']);

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
                            location.reload();

                        }

                    });
            }
            else {
                alert("please fill detail");
            }
        }
</script>
<script src="{{ asset('assets/js/pages/rating.init.js') }}"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>


<!-- swiper js -->
<script src="{{asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<script src="{{asset('assets/js/pages/ecommerce-product-detail.init.js') }}"></script>
@endsection