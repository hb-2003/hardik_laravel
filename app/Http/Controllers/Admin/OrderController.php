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

        // echo $refundorders;
        // die;
        return view('admin.order.index', compact('userorders'));
    }

    public function pending(Request $request)
    {

        $paddingorders =  Order::with('order_product')->where('status', 1)->where('order_status', 0)->get();

        return view('admin.order.pending', compact('paddingorders'));
    }

    public function cansal(Request $request)
    {

        $cansalorders =  Order::with('order_product')->where('status', 1)->where('order_status', 2)->get();


        return view('admin.order.cansal', compact('cansalorders'));
    }

    public function return(Request $request)
    {


        $refundorders =  Order::with('order_product')->where('status', 1)->where('order_status', 3)->get();

        return view('admin.order.return', compact('refundorders'));
    }

    public function delivered(Request $request)
    {
        $deliveredcount =  Order::with('order_product')->where('status', 1)->where('order_status', 4)->count();


        $delivaryorders =  Order::with('order_product')->where('status', 1)->where('order_status', 4)->get();

        return view('admin.order.delivered', compact('delivaryorders', 'deliveredcount'));
    }

    public function confirmorder(Request $request, $id)

    {
        if ($request->isMethod('POST')) {

            $userorders =  Order::with('order_product')->where('id', $id)->first();

            $userorders;
            $userorders->update([
                'order_status' => 4,

            ]);
            return redirect()->route('admin.padding');
        }
    }

    public function cansalorder(Request $request, $id)

    {


        $userorders =  Order::with('order_product')->where('id', $id)->first();

        $userorders;
        $userorders->update([
            'order_status' => 2,
            'status' => 2,

        ]);
        return redirect()->route('admin.order');
    }

    public function deliveredconform(Request $request, $id)
    {
        $delivereds =  Order::with('order_product')->where('id', $id)->first();
        $delivereds->update([
            'order_status' => 1,

        ]);
        return redirect()->route('admin.delivered');
    }

    public function return_pending(Request $request)
    {
        $returnpenddings =  Order::with('order_product')->where('status', 1)->where('order_status', 3)->get();

        return view('admin.order.return_pendding', compact('returnpenddings'));
    }

    public function confirmreturn(Request $request, $id)
    {
        $delivereds =  Order::with('order_product')->where('id', $id)->first();
        $delivereds->update([
            'status'=>3,
            'order_status' => 5,

        ]);
        return redirect()->route('admin.return_pending');
    }
}
