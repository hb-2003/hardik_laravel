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
    <link rel="stylesheet" href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}">
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
    <link href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />



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
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{route('home')}}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <!-- <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$6951.02</b></span></a>
                    <a class="dropdown-item d-flex align-items-center" href="contacts-settings.html"><i class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Settings</span><span class="badge badge-soft-success ms-auto">New</span></a>
                    <a class="dropdown-item" href="auth-lockscreen-cover.html"><i class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a> -->
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

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <h5>Showing result for </h5>
                                                    <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                        <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                                        <li class="breadcrumb-item active"></li>
                                                    </ol>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-inline float-md-end">
                                                    <div class="search-box ms-2">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control bg-light border-light rounded" placeholder="Search...">
                                                            <i class="bx bx-search search-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="produt" role="tabpanel">
                                                <div class="row">
                                                    @foreach($products as $product)


                                                    <div class="col-xl-4 col-sm-6">
                                                        <div class="card dash-product-box shadow-none border text-center">
                                                            <a href="{{route('productdetail',$product->id)}}">
                                                                <div class="card-body">

                                                                    <div class="dash-product-img">
                                                                        <img src="{{asset('images/product/'.$product->productimage[0]->name) }}" class="img-fluid" width="75%" alt="">
                                                                    </div>

                                                                    <h5 class="font-size-17 mt-1">
                                                                        <a href="#" class="text-dark lh-base">{{$product->products_name}}</a>
                                                                    </h5>
                                                                    <h5 class="font-size-20 text-primary mt-3 mb-0"><del class="font-size-17 text-muted fw-normal me-1"></del>₹{{$product->products_price}}</h5>


                                                                    <div class="font-size-16 mt-2">
                                                                        <i class="bx bx-star text-warning"></i>
                                                                        <i class="bx bx-star text-warning"></i>
                                                                        <i class="bx bx-star text-warning"></i>
                                                                        <i class="bx bx-star-half-full text-warning"></i>
                                                                    </div>

                                                                    <div class="mt-4">
                                                                        <a href="#" class="btn btn-primary btn-sm w-lg"><i class="bx bx-cart me-1 align-middle"></i> Buy
                                                                            Now</a>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>



                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-sm-7">
                                                <div class="float-sm-end">
                                                    {{ $products->onEachSide(5)->links() }}
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!-- Scripts js Start -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js ') }} "></script>
    <script src="{{asset('assets/libs/metismenujs/metismenujs.min.js ') }} "></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js ') }} "></script>
    <script src="{{asset('assets/libs/feather-icons/feather.min.js ') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script type="text/javascript">
        function yourFunction(product_id, quantity, price) {
            if (quantity.length > 0) {
                $.ajax({
                    url: "{{route('cart')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        product_id: product_id,
                        quantity: quantity,
                        price: price,


                    },
                    success: function(responseData) {


                        window.location.href = `/login`;

                    }

                });
            } else {
                alert("please select quantity");
            }
        }

        function review(product_id, reting, detail) {


            if (detail.length > 0) {
                $.ajax({
                    url: "{{route('user.review')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        product_id: product_id,
                        reting: reting,
                        detail: detail,


                    },
                    success: function(responseData) {
                        location.reload();

                    }

                });
            } else {
                alert("please fill detail");
            }
        }
    </script>
    <script src="{{ asset('assets/js/pages/rating.init.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>


    <!-- swiper js -->
    <script src="{{asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{asset('assets/js/pages/ecommerce-product-detail.init.js') }}"></script>

    <script src="{{asset('assets/js/app.js') }} "></script>
    @include('layouts.user.notification')

    <!-- Scripts js End -->

</body>

</html>