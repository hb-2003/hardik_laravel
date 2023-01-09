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
                                            <img src="{{asset('user/your_account/Box._CB485927553_.png')}}" width="75" alt="" class=".avatar-lg">
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
                                                <p style="color: black;">Edit addresses for orders and gifts</p>
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
                            <a href="{{route('user.profile')}}">
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
                        </div><!-- end col -->

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
                        </div>

                        <!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>





@endsection