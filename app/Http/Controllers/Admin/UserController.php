<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\User;

class UserController extends Controller
{


    public function user()
    {
        $users  =  User::all();
        return view('admin.user.index', compact('users'));
    }

    public function subscribe()
    {
        $subscribes  =  Subscribe::all();
        return view('admin.subscribe.index', compact('subscribes'));
    }
    public function userinactive($id)
    {

        $userinactive =  user::where('id', $id)->first();
        $userinactive->update([
            'status' => 0,
        ]);
        return redirect()->back();
    }
}
