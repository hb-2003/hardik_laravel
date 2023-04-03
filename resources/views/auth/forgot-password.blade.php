@extends('layouts.auth')
@section('title', 'Forgot password')

@section('content')


<div class="auth-page d-flex align-items-center min-vh-100">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="d-flex flex-column h-100 py-5 px-4">
                    <div class="text-center text-muted mb-2">
                        <div class="pb-3">
                            <a href="#">
                                <span class="logo-lg">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Vuesy Furniture</span>
                                </span>
                            </a>
                            <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0"></p>
                        </div>
                    </div>

                    <div class="my-auto">
                        <div class="p-3 text-center">
                            <img src="assets/images/auth-img.png" alt="" class="img-fluid">
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
                        <div class="col-xl-4 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="text-center">
                                            <h5 class="mb-0">Forgot Password</h5>
                                            <p class="text-muted mt-2">Enter the email address you used when you joined and we'll send you instructions to reset your password.</p>
                                        </div>
                                        <form class="mt-4 pt-2" method="POST" action="{{ route('password.email') }}">
                                            @csrf
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input  class="form-control" id="input-newpassword" type="email" name="email" value="{{ old('email') }}" placeholder="Email" autofocus required>
                                                <label for="input-newpassword">email</label>
                                                <div class="form-floating-icon">
                                                    <i class="bx bx-mail-send"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100" type="submit">Reset</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="text-muted mb-0">Remember It ? <a href="{{ route('login') }}" class="fw-semibold text-decoration-underline"> Sign In </a> </p>
                                            </div>

                                        </form><!-- end form -->
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

<div id="mytask-layout" class="theme-indigo">

    <!-- main body area -->
    <div class="main p-2 py-3 p-xl-5">

        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                <svg width="4rem" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                            </div>
                            <div class="mb-5">
                                <h2 class="color-900 text-center">My-Task Let's Management Better</h2>
                            </div>
                            <!-- Image block -->
                            <div class="">
                                <img src="{{asset('assets/images/login-img.svg')}}" alt="login-img">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <img src="{{asset('assets/images/forgot-password.svg')}}" class="w240 mb-4" alt="" />
                                    <h1>Forgot password?</h1>
                                    <span>Enter the email address you used when you joined and we'll send you instructions to reset your password.</span>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <!--  <input type="email" class="form-control form-control-lg" placeholder="name@example.com"> -->

                                        <input id="email" class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" placeholder="Email" autofocus required>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <!-- <a href="auth-two-step.html" title="" class="btn btn-lg btn-block btn-light lift text-uppercase">SUBMIT</a> -->


                                    <button class="btn btn-lg btn-block btn-light lift text-uppercase" type="submit">SUBMIT</button>


                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted"><a href="{{ route('login') }}" class="text-secondary">Back to Sign in</a></span>
                                </div>
                            </form>
                            <!-- End Form -->

                        </div>
                    </div>
                </div> <!-- End Row -->

            </div>
        </div>

    </div>

</div>


@endsection