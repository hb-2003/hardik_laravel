<?php

use App\Models\Cart;
use Illuminate\Support\Facades\auth;
use App\Models\Categorie;

$cartscount = Cart::where('user_id', auth::user()->id)->where('status', 0)->sum('quantity');
$categories  = Categorie::all();


?>
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
                        <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26"> <span class="logo-txt">Vuesy Funicha.</span>
                    </span>
                </a>
                <a href="{{route('user.dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26"> <span class="logo-txt">Vuesy Funichar</span>
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
                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.dashboard')}}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-home-circle icon"></i>
                                    <span data-key="t-dashboard">Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.product')}}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class=" bx bxl-product-hunt"></i>
                                    <span data-key="t-dashboard">Product</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                    <i class="bx bx-customize icon"></i>
                                    <span data-key="t-apps">Apps</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    @foreach($categories as $key => $categorie)
                                    <a href="{{route('categorieproduct',$categorie->id)}}" class="dropdown-item" data-key="t-calendar">{{$categorie->categorie_name}}</a>

                                    @endforeach



                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.contectus')}}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="  bx bxs-book-content"></i>
                                    <span data-key="t-dashboard">Contect Us</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.aboutus')}}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class=" bx bx-detailt"></i>
                                    <span data-key="t-dashboard">About Us</span>
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

                    <form class="p-2" method="POST" action="{{ route('user.search') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" class="form-control rounded bg-light border-0" name="search" placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <a href="{{route('user.cartdetail')}}" class="btn header-item noti-icon  pt-4.5" style="padding-top: 2rem;">
                    <iconify-icon icon="material-symbols:garden-cart-outline"></iconify-icon>
                    <span id="cartcount" class="noti-dot bg-danger rounded-pill">{{$cartscount}}</span>
                </a>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }} {{ ucfirst(Auth::user()->user_name) }}
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header">Welcome {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}</h6>
                    <a class="dropdown-item" href="{{route('user.account')}}"></i> <span class="align-middle">your account</span></a>
                    <a class="dropdown-item" href="{{route('user.order')}}"> <span class="align-middle">your ordere</span></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> sign out</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="hori-overlay"></div>