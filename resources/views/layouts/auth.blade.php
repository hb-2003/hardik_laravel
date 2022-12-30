<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
        <meta charset="utf-8" />
        <title>Sign In | Vuesy - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>



<body>
        @yield('content')


        <!-- Footer End -->
        <!-- Scripts js Start -->
        @include('layouts.user.script')
        @include('layouts.user.notification')
        <!-- Jquery Core Js -->
        <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenujs/metismenujs.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/pass-addon.init.js')}}"></script>
        <script src="{{asset('user/js/notify/bootstrap-notify.min.js') }}"></script>
        <script>
                @if(Session::has('success'))
                $.notify({
                        message: "{{ Session::get('success') }}"
                }, {
                        type: 'success'
                });
                @php
                Session::forget('success');
                @endphp
                @endif
                @if(Session::has('error'))
                $.notify({
                        message: "{{ Session::get('error') }}"
                }, {
                        type: 'danger'
                });
                @php
                Session::forget('error');
                @endphp
                @endif
                @if($errors -> any())
                @foreach($errors -> all() as $error)
                $.notify({
                        message: "{{ $error }}"
                }, {
                        type: 'danger'
                });
                @endforeach
                @endif
        </script>
</body>

</html>