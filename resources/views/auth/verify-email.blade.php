@extends('layouts.auth')


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
                                    <img src="{{asset('assets/images/logo-sm.svg') }}" alt="" height="24"> <span class="logo-txt">Vuesy Furniture</span>
                                </span>
                            </a>
                            <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">User Experience & Interface Design Strategy Saas Solution</p>
                        </div>
                    </div>

                    <div class="my-auto">
                        <div class="p-3 text-center">
                            <img src="assets/images/auth-img.png" alt="" class="img-fluid">
                        </div>
                    </div>

                    <div class="mt-4 mt-md-5 text-center">
                        <p class="mb-0">© <script>
                                document.write(new Date().getFullYear())
                            </script> Vuesy Furniture. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a></p>
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
                        <div class="col-xl-4 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="avatar-lg mx-auto">
                                            <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                                                <i class="uil uil-envelope-alt"></i>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4 pt-2">
                                            <h4>Verify Your Email</h4>
                                            <p>We have sent you verification email <span class="fw-semibold">example@abc.com</span>, Please check it</p>
                                            <form method="POST" action="{{ route('verification.send') }}">
                                                @csrf
                                                <button class="login-btn" type="submit">
                                                    {{ __('Resend Verification Email') }}
                                                </button></a>
                                            </form>
                                            <form method="POST" class=" p-3" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="login-btn" type="submit">
                                                    {{ __('Logout') }}
                                                </button>
                                            </form>
                                        </div>


                                        <div class="mt-4 pt-3 text-center">
                                            <p class="text-muted mb-0">Didn't receive an email ?<a href="#" class="fw-semibold text-decoration-underline"> Resend </a> </p>
                                        </div>

                                    </div>
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


@endsection