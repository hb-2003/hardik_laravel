<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            if ($request->user()->role == 1) {
                return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
            } else {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'A new verification link has been sent to the email address you provided during registration.');
    }
}
