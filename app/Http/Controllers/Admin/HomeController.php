<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // session()->put('success','success!');
        // session()->put('error','error!');
         
        return view('admin.home');
    }


}
