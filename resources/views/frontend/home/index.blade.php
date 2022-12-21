<!doctype html>

<html lang="en" data-layout="twocolumn" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Login Register Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

        <title>{{ config('app.name', 'Tournament') }} - @yield('title')</title>

        <!-- Favicon Icon -->
        <link rel="icon" type="image/png" href="{{ asset('user/images/fav.png') }}">

        <!-- Stylesheets -->
       
    </head>
    <body>
      <header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-dark1 justify-content-sm-start">
                   
                       
                        @auth
                        @else
                            <a href="{{ route('login') }}" class="add-event">Login</a>
                            <a href="{{ route('register') }}" class="add-event">Register</a>
                        @endauth
                    </div>
                    @auth
                    <div class="account order-1 dropdown">
                        <a href="#" class="account-link dropdown-toggle-no-caret" role="button" data-toggle="dropdown">
                            <div class="user-dp">
                              
                            </div>
                            <span>{{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}</span>
                            <i class="fas fa-angle-down"></i>
                        </a>
                        
                    </div>
                    @endauth
                </nav>
                <div class="overlay"></div>
            </div>
        </div>
    </div>
</header>

    </body>
</html>

