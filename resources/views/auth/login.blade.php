@extends('layouts.auth')



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
                        <div class="col-xl-5 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue to Vuesy Furniture.</p>
                                        </div>
                                        <form class="mt-4 pt-2" method="POST" id="login" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="email" name="email"  placeholder="name@example.com" class="form-control" id="input-username" placeholder="Enter email " autofocus>
                                                <label for="input-username">email</label>
                                                <div class="form-floating-icon">
                                                    <i class="bx bxs-user"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="password"  placeholder="***************" autofocus >
                                                
                                                <label for="password-input">Password</label>
                                                <div class="form-floating-icon">
                                                    <i class="bx bxs-lock-alt"></i>
                                                </div>
                                            </div>
                                            <div class="form-check form-check-primary font-size-16 py-1">
                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                <div class="float-end">
                                                    <a href="{{ route('password.request') }}" class="text-muted text-decoration-underline font-size-14">Forgot your password?</a>
                                                </div>
                                                <label class="form-check-label font-size-14" for="remember-check">
                                                    Remember me
                                                </label>
                                            </div>

                                            <div class="mt-3">
                                                <button class="btn btn-primary w-100" type="submit">Log In</button>
                                            </div>

                                            <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">Don't have an account ? <a href="{{ route('register') }}" class="fw-semibold text-decoration-underline"> Signup Now </a> </p>
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


@endsection

@section('js')
<script>
    $().ready(function() {
        $("#login").validate({
            rules: {
                email: 'required',
                password: 'required'
            },
            messages: {
                email: "Please enter your email",
                password: "Please enter your password",
            }
        });
    });
</script>
@endsection