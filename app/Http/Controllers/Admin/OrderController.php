<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Order;

class OrderController extends Controller

{
    public function order(Request $request)

    {
        $userorders =  Order::with('order_product')->get();
        // foreach($userorders as $userorder)
        // {
        //     foreach($userorder->order_product as $product)
        //     {
        //         echo $product->id;
        //     }

        // }
        //  echo "<pre>";
        // print_r($userorders->order);
        // die;

        return view('admin.order.index', compact('userorders'));
    }
    
}
