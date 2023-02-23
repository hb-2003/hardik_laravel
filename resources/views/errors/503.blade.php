@extends('errors::layouts')

@section('title', __('Service Unavailable'))

@section('content')
<div class="auth-page d-flex align-items-center min-vh-100">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="d-flex flex-column h-100 py-5 px-4">
                    <div class="text-center text-muted mb-2">
                        <div class="pb-3">
                            <a href="index-2.html">
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="24"> <span class="logo-txt">Vuesy Furniture</span>
                                </span>
                            </a>
                            <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">User Experience & Interface Design Strategy Saas Solution</p>
                        </div>
                    </div>

                    <div class="my-auto">
                        <div class="p-3 text-center">
                            <img src="{{asset('assets/images/auth-img.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>

                <!-- end auth full page content -->
            </div>
            <!-- end col -->

            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg bg-light py-md-5 p-4 d-flex">
                    <div class="bg-overlay-gradient"></div>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center g-0 align-items-center w-100">
                        <div class="col-xl-6 col-lg-8">
                            <div class="px-3 py-3 text-center">
                                <h1 class="error-title"><span class="blink-infinite">503</span></h1>
                                <h4 class="text-uppercase text-white"></h4>
                                <p class="font-size-15 mx-auto text-white-50 w-75 mt-4">   
              </p>
                                <div class="mt-5 text-center">
                                    <a class="btn btn-primary waves-effect waves-light" href="{{ app('router')->has('home') ? route('home') : url('/') }}"> BACK TO HOME PAGE</a>
                                </div>
                                <div class="mt-5 pt-4 px-5">
                                    <img src="{{asset('assets/images/error-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>
<div class="error-wrapper">
    <div class="container">
        <img class="img-100" src="{{ asset('admin/images/other-images/sad.png') }}" alt="logo">
        <div class="error-heading">
            <h2 class="headline font-secondary">
                503
            </h2>
        </div>
        <div class="col-md-8 offset-md-2">
            <p class="sub-content">
                {{ __('Service Unavailable') }}
            </p>
        </div>
        <div>
            <a class="btn btn-secondary-gradien btn-lg" href="{{ app('router')->has('home') ? route('home') : url('/') }}">
                BACK TO HOME PAGE
            </a>
        </div>
    </div>
</div>
@endsection
