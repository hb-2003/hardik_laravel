<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vesuy admin</title>
    <title>{{ config('app.name', 'vesuy ') }} - @yield('title')</title>
    <!-- Stylesheets -->
    @include('layouts.admin.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('admin/dist/img/AdminLTELogo.png')}}"" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('layouts.admin.header')
    @include('layouts.admin.notification')
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->

    <!-- Page Sidebar Start-->
    @include('layouts.admin.sidebar')
    <!-- Page Sidebar Ends-->


    @yield('content')
   
    <!-- footer start-->
    @include('layouts.admin.footer')
</div>
    <!-- Scripts js Start -->
    @include('layouts.admin.script')
    
    <!-- Scripts js End -->
</body>

</html>