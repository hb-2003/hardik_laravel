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
                                    <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Vuesy</span>
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
                            </script> Vuesy. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a></p>
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
                                            <h5 class="mb-0">Register Account</h5>
                                            <p class="text-muted mt-2">Get your free Vuesy account now.</p>
                                        </div>
                                        <form class="mt-4 pt-2" action="{{ route('register') }}" method="POST">
                                            @csrf

                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" class="form-control" id="input-username" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" autofocus required>
                                                <label for="input-username">Full name</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-users-alt"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" class="form-control" id="input-username" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" autofocus required>
                                                <label for="input-username">Full name</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-users-alt"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="email" class="form-control" id="input-email" placeholder="Enter Email" name="email" value="{{ old('email') }}" required="">
                                                <div class="invalid-feedback">
                                                    Please Enter Email
                                                </div>
                                                <label for="input-email">Email</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-envelope-alt"></i>
                                                </div>
                                            </div>

                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="password" class="form-control" onpaste="return false" placeholder="Enter password" id="password" name="password" required>
                                                <label for="input-password">Password</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-padlock"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                                <label for="input-password"> Confirm Password</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-padlock"></i>
                                                </div>
                                            </div>

                                            <div class="py-1">
                                                <p class="mb-0">By registering you agree to the Vuesy <a href="#" class="text-primary">Terms of Use</a></p>
                                            </div>

                                            <div class="mt-3">
                                                <button class="btn btn-primary w-100" type="submit">Register</button>
                                            </div>

                                            <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">Already have an account ? <a href="{{ route('login') }}" class="fw-semibold text-decoration-underline"> Login </a> </p>
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