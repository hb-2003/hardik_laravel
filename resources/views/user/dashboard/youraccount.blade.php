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
            <h2>Your Account</h2>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="{{route('user.order')}}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{asset('user/your_account/order.jpg')}}" width="75" alt="" class=".avatar-lg">
                                        </div>
                                        <div class="col-8">
                                            <div class="col">
                                                <h4>YourOrders</h4>
                                            </div>
                                            <div class="col">
                                                <p style="color: black;">Treck,return,or Buy things again</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- end col -->

                        <div class="col-lg-4">
                            <a href="{{route('user.profile')}}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{asset('user/your_account/OIP.jpg')}}" alt="" class=".avatar-lg" width="75">
                                        </div>
                                        <div class="col-8">
                                            <div class="col">
                                                <h4>Your profile</h4>
                                            </div>
                                            <div class="col">
                                                <p style="color: black;">Edit profile</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- end col -->

                        <div class="col-lg-4">
                            <a href="{{route('user.address')}}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{asset('user/your_account/address-map-pin._CB485934183_.png')}}" alt="" width="75" class=".avatar-lg">
                                        </div>
                                        <div class="col-8">
                                            <div class="col">
                                                <h4>Your Addresses</h4>
                                            </div>
                                            <div class="col">
                                                <p style="color: black;">Manage your address</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- end col -->
                        <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="{{route('user.change_pass')}}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{asset('user/your_account/sign-in-lock._CB485931504_.png')}}" width="75" alt="" class=".avatar-lg">
                                        </div>
                                        <div class="col-8">
                                            <div class="col">
                                                <h4>Login & security</h4>
                                            </div>
                                            <div class="col">
                                                <p style="color: black;">Change password</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="{{route('user.contectus')}}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{asset('user/your_account/contact_us._CB623781998_.png')}}" width="75" alt="" class=".avatar-lg">
                                        </div>
                                        <div class="col-8">
                                            <div class="col">
                                                <h4>Contact Us</h4>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="{{route('user.faqs')}}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="data:image/png;base64,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" width="75" alt="" class=".avatar-lg">
                                        </div>
                                        <div class="col-8">
                                            <div class="col">
                                                <h4>FAQs</h4>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- end col -->


                        <!-- <div class="col-lg-4">
                            <a href="#">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{asset('user/your_account/contact_us._CB623781998_.png')}}" width="75" alt="" class=".avatar-lg">
                                        </div>
                                        <div class="col-8">
                                            <div class="col">
                                                <h4>Contact Us</h4>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->

                        <!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>





@endsection