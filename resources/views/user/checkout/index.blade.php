@extends('layouts.user.app')
@section('title', 'content')

@section('css')
@endsection

@section('style')
@endsection

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div id="addproduct-accordion" class="custom-accordion">
                        <form action="{{route('user.checkout')}}" method="POST" class="needs-validation">
                            <div class="card">
                                <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                                    <div class="p-4">

                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        01
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Billing Info</h5>
                                                <p class="text-muted text-truncate mb-0">fill all detail</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <i class="bx bx-chevron-up accor-down-icon font-size-24"></i>
                                            </div>

                                        </div>

                                    </div>
                                </a>

                                <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">

                                        @csrf
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-name">Name</label>
                                                        <input type="text" class="form-control" id="billing-name" placeholder="Enter name" name="billing_name">

                                                    </div>
                                                    @error('billing_name')
                                                    <div class="alert alert-danger">The name is required.</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-email-address">Email Address</label>
                                                        <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email" name="email">

                                                    </div>
                                                    @error('email')
                                                    <div class="alert alert-danger">The email is required.</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="billing-phone">Phone</label>
                                                        <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no." name="customers_telephone">
                                                    </div>
                                                    @error('customers_telephone')
                                                    <div class="alert alert-danger">The telephone is required.</div>
                                                    @enderror
                                                </div>
                                            </div>
            
                                        </div>

                                        
                                        <div class="row p-3">
                                            <div class="col">
                                                <div class="text-end mt-2 mt-sm-0">
                                                    <a href="#addproduct-img-collapse" class="text-dark collapsed btn btn-primary" data-bs-toggle="collapse" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-img-collapse">submit</a>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            <div class="card" id="address">

                                <div class="p-4">

                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                    02
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-16 mb-1">Shipping Info</h5>
                                            <p class="text-muted text-truncate mb-0">Shipping Info</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="bx bx-chevron-up accor-down-icon font-size-24"></i>
                                        </div>

                                    </div>

                                </div>
                                </a>

                                <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 ">
                                        <div class="row">
                                            @foreach($address as $addres)

                                            <div class="col-lg-4 col-sm-6">
                                                <div data-bs-toggle="collapse">
                                                    <label class="card-radio-label mb-0">
                                                        <input type="radio" value="{{$addres->id}}" name="billing_address_format_id" id="info-address1" class="card-radio-input">
                                                        <span class="card-radio text-truncate p-3">
                                                            <span class="fs-14 mb-4 d-block">Address 1</span>
                                                            <span class="fs-14 mb-2 d-block"></span>
                                                            <span class="text-muted fw-normal text-wrap mb-1 d-block">{{$addres ->address}},{{$addres ->city}},{{$addres ->state}},{{$addres ->country}}</span>

                                                            <span class="text-muted fw-normal d-block">Mo. 012-345-6789</span>
                                                        </span>
                                                    </label>
                                                    <div class="edit-btn bg-light  rounded">
                                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                            <i class="bx bx-pencil font-size-16"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                @error('billing_address_format_id')
                                                <div class="alert alert-danger">The select address is required.</div>
                                                @enderror
                                            </div>
                                            @endforeach


                                        </div>
                                        <div class="row p-3">
                                            <div class="col">
                                                <div class="text-end mt-2 mt-sm-0">
                                                    <a href="#addproduct-metadata-collapse" class="text-dark collapsed btn btn-primary" data-bs-toggle="collapse" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-metadata-collapse">submit</a>
                                                    <a href="#addproduct-billinginfo-collapse" class="text-dark collapsed btn btn-danger" data-bs-toggle="collapse" aria-expanded="true" aria-haspopup="true" aria-controls="addproduct-img-collapse">back</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="card" id="payment">

                                <div class="p-4">

                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                    03
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-16 mb-1">Payment Info</h5>
                                            <p class="text-muted text-truncate mb-0">Payment method :</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="bx bx-chevron-up accor-down-icon font-size-24"></i>
                                        </div>

                                    </div>

                                </div>
                                </a>

                                <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                        <div>
                                            <h5 class="font-size-14 mb-3">Payment method :</h5>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div data-bs-toggle="collapse">
                                                        <label class="card-radio-label">
                                                            <input type="radio" value="credit" name="payment_method" id="pay-methodoption1" class="card-radio-input">
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                                Credit / Debit Card
                                                            </span>
                                                        </label>
                                                    </div>

                                                </div>

                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <label class="card-radio-label">
                                                            <input type="radio" value="pay" name="payment_method" id="pay-methodoption2" class="card-radio-input">
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                                Paypal
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <label class="card-radio-label">
                                                            <input type="radio" value="cas" name="payment_method" id="pay-methodoption3" class="card-radio-input">

                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bx-money d-block h2 mb-3"></i>
                                                                <span>Cash on Delivery</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('payment_method')
                                                <div class="alert alert-danger">The select pyment method is required.</div>
                                                @enderror
                                            </div>

                                            <div class="row p-3">
                                                <div class="col">

                                                    <div class="text-end mt-2 mt-sm-0">
                                                        <button type="submit" class="btn btn-primary">
                                                            order </button>
                                                        <a href="#addproduct-img-collapse" class="text-dark collapsed btn btn-danger" data-bs-toggle="collapse" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-img-collapse">back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row my-4">
                        <div class="col">

                        </div>
                        <div class="col">
                            <div class="text-end mt-2 mt-sm-0">
                                <a href="{{route('user.dashboard')}}" class="btn btn-primary ">
                                    <i class="bx bx-arrow-left me-1"></i> Continue Shopping </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="p-3 bg-light mb-2">
                                <h5 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">#MN0124</span></h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered mb-0 table-nowrap">
                                    <thead>\

                                        <tr>
                                            <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                            <th class="border-top-0" scope="col">Product Desc</th>
                                            <th class="border-top-0" scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartdetails as $cartdetail)

                                        <tr>
                                            <th scope="row"><img src="{{asset('images/product/'.$cartdetail->productimage[0]->name)}}" alt="product-img" title="product-img" class="avatar-md"></th>
                                            <td>
                                                <h5 class="font-size-16 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$cartdetail->product[0]->products_name}}</a></h5>
                                                <p class="text-muted mb-0">$ {{$cartdetail->product_price}} x {{$cartdetail->quantity}}</p>
                                            </td>
                                            <td>$ {{$cartdetail->total}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Sub Total :</h5>
                                            </td>
                                            <td>
                                                $ {{$carttotal}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Discount :</h5>
                                            </td>
                                            <td>
                                            $ 0
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                            </td>
                                            <td>
                                                $ 0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                                            </td>
                                            <td>
                                                $ 0
                                            </td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="2">
                                                <h5 class="font-size-16 m-0">Total:</h5>
                                            </td>
                                            <td>
                                                $ {{$carttotal}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@endsection

@section('js')


@endsection