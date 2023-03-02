<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Citie;
use App\Models\Countrie;
use App\Models\State;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use Reflector;
use Str;

class OrderController extends Controller
{
    public function cansal(Request $request, $id)

    {
        $userorders =  Order::with('order_product')->where('customers_id', auth::user()->id)->where('id', $id)->first();
        $userorders;
        $userorders->update([
            'status'=>3,
            'order_status' => 2,

        ]);




        return redirect()->route('user.order');
    }

    public function cansalorderreorder(Request $request, $id)

    {
        $userorders =  Order::with('order_product')->where('customers_id', auth::user()->id)->where('id', $id)->first();
        
        $userorders->update([
            
            'order_status' => 3,

        ]);




        return redirect()->route('user.order');
    }
    public function orderreturn(Request $request, $id)

    {
        $userorders =  Order::with('order_product')->where('customers_id', auth::user()->id)->where('id', $id)->first();
        $userorders;
        $userorders->update([
            'order_status' => 3,

        ]);




        return redirect()->route('user.order');
    }
    public function orderreorder(Request $request, $id)

    {
        $userorders =  Order::with('order_product')->where('customers_id', auth::user()->id)->where('id', $id)->first();

        




      







        return redirect()->route('user.order');
    }
}
