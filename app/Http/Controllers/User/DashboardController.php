<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;

use Str;

class DashboardController extends Controller
{
    public function index(Request $request)
    { $products = Product::with('productimage')->paginate(12);
       
        $users = User::count();
        $user = auth()->user();
        $referralUrl = URL::to('/').'/register?referralcode='.$user->referralcode;
        return view('user.dashboard.index', ['user' => $user, 'referralUrl' => $referralUrl],compact('users','products'));
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('POST')) {
            
          
            $user = auth()->user();
            $user = user::find(auth::user()->id);
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->gender = $request['gender'];
            $user->dob = $request['dob'];

            $user->telephone = $request['telephone'];
            $user->email     = $request['email'];
            $user->update();
     
            session()->put('success', 'Your profile image data has been updated.');
            return redirect()->route('user.profile');
        }
        if ($request->isMethod('GET')) {
            return view('user.dashboard.profile');
        }
    }

    public function social(Request $request)
    {
        //  echo "<pre>";
        // print_r('request');
        // die;
        return view('user.dashboard.social');
    }

    public function email(Request $request)
    {
         // echo "<pre>";        
         // print_r($request->all());        
         // die; 
        if ($request->isMethod('POST')) {
            $user = auth()->user();
            $data = $request->validate([
                'old_email' => 'required|string|email|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id . ',id,deleted_at,NULL',
            ]);
            if ($data['old_email'] == $user->email) {
                $user->update($data);
                session()->put('success', 'Your email address has been changed successfully.');
            } else {
                session()->put('error', 'Please enter correct current old email address.');
            }
            return redirect()->route('user.email');
        }
        if ($request->isMethod('GET')) {
            return view('user.dashboard.email');
        }
    }

    public function notification(Request $request)
    {
        return view('user.dashboard.notification');
    }

    public function change_pass(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'old_password' => 'required|min:8|max:15',
                'password' => 'required|min:8|max:15|confirmed',
            ]);
           
            $user = auth()->user();
            if (Hash::check($data['old_password'], $user->password)) {
                $user->password = Hash::make($data['password']);
                $user->save();
                session()->put('success', 'Your password has been changed successfully.');
            } else {
                session()->put('error', 'Please enter correct current password.');
            }
            return redirect()->route('user.change_pass');
        }
        if ($request->isMethod('GET')) {
            return view('user.dashboard.change_pass');
        }
    }
}
