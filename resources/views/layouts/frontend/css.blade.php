@yield('css')
@yield('style')

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

    .gmaps {
        content: '<p>HTML Content</p>'
    }
</style>