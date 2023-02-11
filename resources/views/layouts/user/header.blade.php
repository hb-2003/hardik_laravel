<?php

use App\Models\Cart;
use Illuminate\Support\Facades\auth;

$cartscount = Cart::where('user_id', auth::user()->id)->where('status', 0)->sum('quantity');


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
                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.dashboard')}}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                 
                    <form  class="p-2" method="POST" action="{{ route('user.search') }}" enctype="multipart/form-data">
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
        </div>
    </div>
</header>
<div class="hori-overlay"></div>
