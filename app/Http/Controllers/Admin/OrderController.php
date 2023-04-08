<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Order;
use App\Models\User;
use App\Models\Notification;
use App\Models\Order_product;
use Illuminate\Support\Facades\Mail;

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

        $paddingorders =  Order::with('order_product')->where('order_status', 0)->get();

        // echo $paddingorders;
        // die;
        return view('admin.order.pending', compact('paddingorders'));
    }

    public function cansal(Request $request)
    {

        $cansalorders =  Order::with('order_product')->where('order_status', 2)->get();


        return view('admin.order.cansal', compact('cansalorders'));
    }

    public function return(Request $request)
    {


        $refundorders =  Order::with('order_product')->where('order_status', 3)->get();

        return view('admin.order.return', compact('refundorders'));
    }

    public function delivered(Request $request)
    {
        $deliveredcount =  Order::with('order_product')->where('order_status', 4)->count();


        $delivaryorders =  Order::with('order_product')->where('order_status', 4)->get();

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
            $orders = Order::with('order_product')->where('id', $userorders->id)->latest()->first();
            $order_products = Order_product::where('orders_id', $userorders->id)->get();


            $data = ['name' => $orders->customers_name, 'data' => "", 'orders' => $orders, 'order_products' => $order_products];
            $user['to'] = $orders->email;
            $user['subject'] = 'Confirm order';
            Mail::send('email.order', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject($user['subject']);
            });
            return redirect()->back();
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
            'status' => 1

        ]);
        $orders = Order::with('order_product')->where('id', $delivereds->id)->latest()->first();
        $order_products = Order_product::where('orders_id', $delivereds->id)->get();

        $data = ['name' => $orders->customers_name, 'data' => "", 'orders' => $orders, 'order_products' => $order_products];
        $user['to'] = $orders->email;
        $user['subject'] = 'Confirm order';
        Mail::send('email.order', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject($user['subject']);
        });
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

        $users = User::where('id', $delivereds->customers_id)->first();
        $delivereds->update([
            'status' => 3,
            'order_status' => 5,

        ]);

        $data = ['name' => $users->first_name, 'data' => $request['message'], 'delivereds' => $delivereds];
        $user['to'] = $users->email;
        $user['subject'] = 'Confirm Rerurn';
        Mail::send('email.return_order', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject($user['subject']);
        });
        return redirect()->route('admin.return_pending');
    }

    public function orderdetail(Request $request, $id)
    {
        $orderdetails =  Order::with('order_product')->where('id', $id)->first();
        return view('admin.orderdetail.index', compact('orderdetails'));
    }
    public function notificationorder(Request $request, $id)
    {
        $notificationorder = Notification::where('id', $id)->first();
        $notificationorder->update([
            'read_at' => 1,

        ]);

        return redirect()->route('admin.orderdetail', $notificationorder->order_id);
    }
}
