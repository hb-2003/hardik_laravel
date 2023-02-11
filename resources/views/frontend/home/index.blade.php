
<?php
use App\Http\Requests\Auth\LoginRequest;

?>


<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Sales Dashboard | Vuesy - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

    <!-- plugin css -->
    <link href="{{asset('assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- App favicon -->



    <style>
        .mdi::before {
            font-size: 24px;
            line-height: 14px;
        }

        .btn .mdi::before {
            position: relative;
            top: 4px;
        }

        .btn-xs .mdi::before {
            font-size: 18px;
            top: 3px;
        }

        .btn-sm .mdi::before {
            font-size: 18px;
            top: 3px;
        }

        .dropdown-menu .mdi {
            width: 18px;
        }

        .dropdown-menu .mdi::before {
            position: relative;
            top: 4px;
            left: -8px;
        }

        .nav .mdi::before {
            position: relative;
            top: 4px;
        }

        .navbar .navbar-toggle .mdi::before {
            position: relative;
            top: 4px;
            color: #FFF;
        }

        .breadcrumb .mdi::before {
            position: relative;
            top: 4px;
        }

        .breadcrumb a:hover {
            text-decoration: none;
        }

        .breadcrumb a:hover span {
            text-decoration: underline;
        }

        .alert .mdi::before {
            position: relative;
            top: 4px;
            margin-right: 2px;
        }

        .input-group-addon .mdi::before {
            position: relative;
            top: 3px;
        }

        .navbar-brand .mdi::before {
            position: relative;
            top: 2px;
            margin-right: 2px;
        }

        .list-group-item .mdi::before {
            position: relative;
            top: 3px;
            left: -3px
        }
    </style>
</head>

<body data-layout="horizontal" data-topbar="dark">
    <div id="layout-wrapper">
        <!-- Header Start -->
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index-2.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26"> <span class="logo-txt">Vuesy</span>
                            </span>
                        </a>

                        <a href="{{route('user.dashboard')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26"> <span class="logo-txt">Vuesy</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="topnav">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none" href="index-2.html" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-home-circle icon"></i>
                                            <span data-key="t-dashboard">Dashboard</span>
                                        </a>
                                    </li>



                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-search icon-sm"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                            <form class="p-2">
                                <div class="search-box">
                                    <div class="position-relative">
                                        <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    @auth
                        @else
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon">
                            <a href="{{ route('login') }}" class="add-event" style="color: white;">Login /</a>
                            <a href="{{ route('register') }}" class="add-event " style="color: white;">Register</a>
                        </button>

                    </div>
                    @endauth
                    @auth
                  
                    <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }} {{ ucfirst(Auth::user()->user_name) }}
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header">Welcome {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }} ({{ ucfirst(Auth::user()->user_name) }})</h6>
                    <a class="dropdown-item" href="{{route('user.account')}}"></i> <span class="align-middle">your account</span></a>
                    <a class="dropdown-item" href="{{route('user.order')}}"> <span class="align-middle">your ordere</span></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> sign out</a>
                    </form>

                </div>
            </div>
                    @endauth
                </div>
            </div>
        </header>
        <!-- Header End -->
        <!-- Body Start -->
        <div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 ">
                    <div class="" style="width: 100%;">
                      
                        <div class="card-body ">
                            <div class="swiper-container keyboard-control" dir="ltr">


                                <img src="https://ii1.pepperfry.com/media/wysiwyg/banners/Web_Furniture_Banner_2x_06Dec.jpg" class="img-fluid mx-auto d-block" alt>
                            </div>


                        </div>
                    </div>
                </div>
               
            </div>
         
            <div>
                <h5 class="pt-3" style="text-align: center;"> Top Picks For You
                </h5>
            </div>

            <div>
                <h6 class="pb-3" style="text-align: center;">Impressive Collection For Your Dream Home
                </h6>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Categorie</h4>
                            <!-- <a href="" class="d-flex">view all</a> -->
                        </div>
                        <div class="card-body">

                            <div class="row ">
                                @foreach($categories as $categorie)

                                <div class="col-lg-2">
                                    <a href="{{route('categorie',$categorie->categorie_name)}}">
                                        <img src="{{asset('images/categorie/'.$categorie->categorie_image) }}" class="" width="150px" alt cl> </a>
                                    <p class="p-2">{{$categorie ->categorie_name}}</p>
                                </div><!-- end swiper-slide -->

                                @endforeach

                            </div><!-- end swiper wrapper -->

                        </div><!-- end card body -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">New products</h4>
                            <a href="" class="d-flex">view all</a>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="row">

                                @foreach($productssliders as $productsslider)
                                
                                <div class="col-lg-2" align-items-center>
                                    <a href="{{route('productdetail',$productsslider->id)}}">
                                        <img src="{{asset('images/product/'.$productsslider->productimage[0]->name) }}" class="img-fluid mx-auto d-block" alt>
                                        <p class="mt-2 mb-lg-0 mr-5">{{$productsslider->products_name}}</p>

                                    </a>
                                </div><!-- end swiper-slide -->
                                @endforeach
                            </div>

                        </div><!-- end swiper container -->
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
</div>

        <!-- Body End -->
        <!-- Footer Start -->
        <hr style="border: 1px;">
        <div class="footer">
            <div class="card-body">
                <div class="container">
                    <footer class="p-5">
                        <div class="row">
                            <div class="col-6 col-md-2 mb-3">
                                <h5>Section</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                                </ul>
                            </div>

                            <div class="col-6 col-md-2 mb-3">
                                <h5>Section</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                                </ul>
                            </div>

                            <div class="col-6 col-md-2 mb-3">
                                <h5>Section</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                                </ul>
                            </div>

                            <div class="col-md-5 offset-md-1 mb-3">
                                <form>
                                    <h5>Subscribe to our newsletter</h5>
                                    <p>Monthly digest of what's new and exciting from us.</p>
                                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                        <label for="newsletter1" class="visually-hidden">Email address</label>
                                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                        <button class="btn btn-primary" type="button">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </footer>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>

    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js ') }} "></script>
    <script src="{{asset('assets/libs/metismenujs/metismenujs.min.js ') }} "></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js ') }} "></script>
    <script src="{{asset('assets/libs/feather-icons/feather.min.js ') }} "></script>


    <script src="{{asset('assets/js/app.js') }} "></script>
    @include('layouts.user.notification')

    <!-- Scripts js End -->

</body>

</html>