@extends('layouts.auth')
@section('title', 'Reset Password')

@section('content')


<div class="auth-page d-flex align-items-center min-vh-100">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-6">
                <div class="d-flex flex-column h-100 py-5 px-4">
                    <div class="text-center text-muted mb-2">
                        <div class="pb-3">
                            <a href="#">
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo-sm.svg') }}" alt="" height="24"> <span class="logo-txt">Vuesy Furniture</span>
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
                                            <p class="text-muted mt-2">Forgot Your Password?</p>
                                        </div>
                                        <form class="mt-4 pt-2" method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}">
                                                <label for="input-newpassword">email</label>
                                                <div class="form-floating-icon">
                                                    <i class="bx bx-mail-send"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="password" class="form-control" id="input-newpassword" type="password" name="password" placeholder="Password" required>
                                                <label for="input-newpassword">New Password</label>
                                                <div class="form-floating-icon">
                                                    <i class="bx bxs-lock-alt"></i>
                                                </div>
                                            </div>

                                            <div class="form-floating form-floating-custom mb-3">
                                                <input  class="form-control" id="input-confirmpassword" placeholder="Password" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                                <label for="input-confirmpassword">Confirm Password</label>
                                                <div class="form-floating-icon">
                                                    <i class="bx bxs-lock-alt"></i>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100" type="submit">Reset</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="text-muted mb-0">Remember It ? <a href="#" class="fw-semibold text-decoration-underline"> Sign In </a> </p>
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