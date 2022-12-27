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
    @include('layouts.user.css')
</head>

<body data-layout="horizontal" data-topbar="dark">
    <div id="layout-wrapper">
        <!-- Header Start -->
        @include('layouts.user.header')
        <!-- Header End -->
        <!-- Body Start -->
        @yield('content')
        <!-- Body End -->
        <!-- Footer Start -->
        @include('layouts.user.footer')
        <!-- Footer End -->
    </div>
    @include('layouts.user.notification')
    <!-- Scripts js Start -->
    @include('layouts.user.script')
   
    <!-- Scripts js End -->

</body>

</html>