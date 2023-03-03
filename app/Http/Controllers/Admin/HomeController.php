<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Notification;

class HomeController extends Controller
{
    public function home()
    {
        // $notifications  = Notification::with('product')->where('read_at',0)->get();
        // foreach($notifications  as $notification)
        // {
            
            
        // }
        // die;
        $totalusers = User::count();
        $totalanverifyuser  =User::where('email_verified_at',Null)->count();
        $last24users = User::where('created_at', '>', Carbon::now()->subMinutes(1440))->count();
        $lastweekusers = User::where('created_at', '>', Carbon::now()->subWeek(1))->count();
        $totalproduct = Product::count();
        $totalOrder = Order::count();
        $total24Order = Order::where('created_at', '>', Carbon::now()->subMinutes(1440))->count();
        $totalweekOrder = Order::where('created_at', '>', Carbon::now()->subWeek(1))->count();
        $totalmonthOrder = Order::where('created_at', '>', Carbon::now()->subMonth(1))->count();
        $totalpenddingOrder = Order::where('order_status',0)->count();
        $totalorerOrder = Order::where('order_status',5 )->count();
        $Products  =  Product::with('productimage')->latest()->take(5)->get();
        $userorders =  Order::with('order_product')->latest()->take(5)->get();
       $totalcalsalorder=  Order::where('order_status',2 )->where('status',3)->count();
       $totaldelivaryorder= Order::where('order_status',2 )->where('status',4)->count();
       $confirmorder = Order::where('order_status',1)->where('status',1)->count();
        // session()->put('success','success!');
        // session()->put('error','error!');
         
        return view('admin.home',compact('totalusers','totalanverifyuser','last24users','lastweekusers','totalOrder','total24Order','totalweekOrder','totalpenddingOrder','totalorerOrder','totalproduct','Products','userorders','totalcalsalorder','totalmonthOrder','totaldelivaryorder','confirmorder'));
    }


}
