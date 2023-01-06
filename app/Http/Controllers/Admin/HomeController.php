<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $totalusers = User::count();
        $totalanverifyuser  =User::where('email_verified_at',Null)->count();
        $last24users = User::where('created_at', '>', Carbon::now()->subMinutes(1440))->count();
        $lastweekusers = User::where('created_at', '>', Carbon::now()->subWeek(1))->count();
        $totalproduct = Product::count();
        $totalOrder = Order::count();
        $total24Order = Order::where('created_at', '>', Carbon::now()->subMinutes(1440))->count();
        $totalweekOrder = Order::where('created_at', '>', Carbon::now()->subWeek(1))->count();
        $totalpenddingOrder = Order::where('order_status',0)->count();
        $totalorerOrder = Order::where('order_status',3 )->where('status',3)->count();
        
        // session()->put('success','success!');
        // session()->put('error','error!');
         
        return view('admin.home',compact('totalusers','totalanverifyuser','last24users','lastweekusers','totalOrder','total24Order','totalweekOrder','totalpenddingOrder','totalorerOrder','totalproduct'));
    }


}
