<?php

use App\Http\Requests\Auth\LoginRequest;

?>


<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Vuesy Furniture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <title>vesuy admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->
    @include('layouts.frontend.css')
</head>

<body data-layout="horizontal" data-topbar="dark">
    <div id="layout-wrapper">
        <!-- /data-layout-mode="dark" -->

        @include('layouts.frontend.header')
        @include('layouts.frontend.notification')
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->

        <!-- Page Sidebar Start-->
        @include('layouts.frontend.sidebar')
        <!-- Page Sidebar Ends-->


        @yield('content')

        <!-- footer start-->
        @include('layouts.frontend.footer')
    </div>
    <!-- Scripts js Start -->
    @include('layouts.frontend.script')

    <!-- Scripts js End -->
</body>

</html>