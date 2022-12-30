@extends('layouts.user.app')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="user-profile-img">
                                <img src="{{asset('assets/images/pattern-bg.jpg')}}" class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                                <div class="overlay-content rounded-top">
                                    <div>
                                        <div class="user-nav p-3">
                                            <div class="d-flex justify-content-end">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal font-size-20 text-white"></i>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end user-profile-img -->

                            <div class="mt-n5 position-relative">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/users/avatar-3.jpg')}}" alt="" class="avatar-xl rounded-circle img-thumbnail">

                                    <div class="mt-3">
                                        <h5 class="mb-1">{{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }} </h5>
                                        

                                        
                                    </div>

                                </div>
                            </div>

                            <div class="p-3 mt-3">
                                <div class="row text-center">
                                    <div class="col-6 border-end">
                                        <div class="p-1">
                                            <h5 class="mb-1">3,658</h5>
                                            <p class="text-muted mb-0">Products</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-1">
                                            <h5 class="mb-1">6.8k</h5>
                                            <p class="text-muted mb-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>

                   
                </div>
                @yield('dashboard')

            </div><!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    @endsection