<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
      
        if (!Auth::guard('web')->validate([
            'email' => $request->User()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
//         $user = User::where('email',$request->email)->first();
// if($user->status == 0 )
// {
//     session()->put('error', 'you are block.');
//     return view('auth.login');
// }

        $request->session()->put('auth.password_confirmed_at', time());
         echo $request;
         die;

        if ($request->user()->role == 1) {
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
