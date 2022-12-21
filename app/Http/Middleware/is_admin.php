<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class is_admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            if (Auth::guard('web')->user()->role == 1) {
                return $next($request);
            } else {
                return redirect(RouteServiceProvider::HOME);
            }
        }
        return redirect('/');
    }
}
