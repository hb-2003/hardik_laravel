<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Addresse;
use App\Models\Cart;
use App\Models\Countrie;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Order_product;
use App\Models\Products_images;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use phpDocumentor\Reflection\Types\Null_;
use Reflector;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{


    public function checkout(Request $request)
    {

        $address = Addresse::where('user_id', auth::user()->id)->get();
        $carttotal = Cart::where('user_id', auth::user()->id)->where('status', 0)->sum('total');

        $conteries = Countrie::all();
        $cartdetails = Cart::with('product', 'productimage')->where('user_id', auth::user()->id)->where('status', 0)->get();


        if ($request->isMethod('POST')) {


            $ip = '$_SERVER["HTTP_CF_CONNECTING_IP"]';

            // Use JSON encoded string and converts
            // it into a PHP variable
            $ipdat = @json_decode(file_get_contents(
                "http://www.geoplugin.net/json.gp?ip=" . $ip
            ));
            $request->validate([
                'billing_name' => 'required',
                'email' => 'required',
                'customers_telephone' => 'required|digits:10',

                'billing_address_format_id' => 'required',
                'payment_method' => 'required',

            ]);
            $countery = $ipdat->geoplugin_countryName;
            $addres = Addresse::where('id', $request->billing_address_format_id)->first();

            $cartdetails = Cart::with('product', 'productimage')->where('user_id', auth::user()->id)->where('status', 0)->get();
            // echo  "<pre>";
            // print_r($addres);
            // die;

            $dt = Carbon::now();

            $order = Order::create([
                'total_tax' => 0,
                'customers_id' => auth::user()->id,
                'customers_name' => $request->billing_name,
                'customers_telephone' => $request->customers_telephone,
                'email' => $request->email,
                'delivery_name' => $addres->first_name,
                'billing_name' => $request->billing_name,
                'billing_street_address' => $addres->address,
                'billing_suburb' => $addres->suburb,
                'billing_city' => $addres->city,
                'billing_postcode' => $addres->postcode,
                'billing_state' => $addres->state,
                'billing_country' => $addres->country,
                'billing_address_format_id' => $request->billing_address_format_id,
                'payment_method' => $request->payment_method,
                'date_purchased' => $dt->addDay(1),
                'orders_date_finished' => $dt->addDay(1),
                'currency' => "INR",
                'order_price' => $carttotal,
                'shipping_cost' => 0,
                'shipping_method' => Null,
                'shipping_duration' => "7 day",
                'order_information' => Null,
                'is_seen' => 0,
                'coupon_code' => Null,
                'coupon_amount' => Null,
                'free_shipping' => 1,
                'product_ids' => Null,
                'delivery_phone	' => NUll,
                'pyment_type' => $request->payment_method,
                'transaction_id ' => NUll,
                'status' => 0,

            ]);

            //    echo $order->id;
            //    die;



            foreach ($cartdetails as $cartdetail) {



                Order_product::create([
                    'orders_id' => $order->id,
                    'products_id' => $cartdetail->product[0]->id,
                    'products_name' => $cartdetail->product[0]->products_name,
                    'products_price' => $cartdetail->product_price,
                    'products_image' => $cartdetail->productimage[0]->name,
                    'final_price' => $cartdetail->product_price,
                    'products_tax' => 0,
                    'products_quantity' => $cartdetail->quantity,

                ]);
                Notification::create([
                    'user_id' => auth::user()->id,
                    'product_id' => $cartdetail->product[0]->id,
                    'order_id' =>  $order->id,
                    'product_name' => $cartdetail->product[0]->products_name,
                    'quantity' => $cartdetail->quantity,
                    'price' => $cartdetail->product_price,

                ]);




                $Product  = Product::where('id', $cartdetail->product[0]->id)->first();
                $quantity = $Product->products_quantity - $cartdetail->quantity;

                $Product->update([
                    'products_quantity' => $quantity,
                    'products_max_stock' => $quantity,
                ]);

                Cart::where('id', $cartdetail->id)->update(['status' => 1]);
            }
            if ($request->payment_method == "pay") {
                $orderid = $order->id;
                return view('user.rezolpay.index', compact('carttotal', 'orderid', 'request', 'order', 'countery'));
            }


            session()->put('success', 'order complete.');
            $orders = Order::with('order_product')->where('id', $order->id)->latest()->first();
            $order_products = Order_product::where('orders_id', $order->id)->get();


            $data = ['name' => $orders->customers_name, 'data' => "", 'orders' => $orders, 'order_products' => $order_products];
            $user['to'] = $orders->email;
            $user['subject'] = 'Confirm order';
            Mail::send('email.order', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject($user['subject']);
            });

            return view('user.successorder.index');
        }
        return view('user.checkout.index', compact('address', 'cartdetails', 'conteries', 'carttotal'));
    }

    public function buycheckout(Request $request, $id)

    {

        $cartdetails = Cart::with('product')->where('user_id', auth::user()->id)->where('status', 0)->first();


        $images =   Products_images::where('product_id', $cartdetails->product_id)->first();



        $address = Addresse::where('user_id', auth::user()->id)->get();
        $carttotal =  $cartdetails->total;
        $conteries = Countrie::all();



        if ($request->isMethod('POST')) {

            $ip = '$_SERVER["HTTP_CF_CONNECTING_IP"]';


            // Use JSON encoded string and converts
            // it into a PHP variable
            $ipdat = @json_decode(file_get_contents(
                "http://www.geoplugin.net/json.gp?ip=" . $ip
            ));
            $request->validate([
                'billing_name' => 'required',
                'email' => 'required',
                'customers_telephone' => 'required|digits:10',
                'billing_address_format_id' => 'required',
                'payment_method' => 'required',

            ]);

            $addres = Addresse::where('id', $request->billing_address_format_id)->first();

            $cartdetails = Cart::with('product')->where('user_id', auth::user()->id)->where('status', 0)->latest()->first();

            // echo  "<pre>";
            // print_r($addres);
            // die;

            $dt = Carbon::now();


            $order = Order::create([
                'total_tax' => 0,
                'customers_id' => auth::user()->id,
                'customers_name' => $request->billing_name,
                'customers_telephone' => $request->customers_telephone,
                'email' => $request->email,
                'delivery_name' => $addres->first_name,
                'billing_name' => $request->billing_name,
                'billing_street_address' => $addres->address,
                'billing_suburb' => $addres->suburb,
                'billing_city' => $addres->city,
                'billing_postcode' => $addres->postcode,
                'billing_state' => $addres->state,
                'billing_country' => $addres->country,
                'billing_address_format_id' => $request->billing_address_format_id,
                'payment_method' => $request->payment_method,
                'date_purchased' => $dt->addDay(7),
                'orders_date_finished' => $dt->addDay(7),
                'currency' => "INR",
                'order_price' => $carttotal,
                'shipping_cost' => 0,
                'shipping_method' => Null,
                'shipping_duration' => "7 day",
                'order_information' => Null,
                'is_seen' => 0,
                'coupon_code' => Null,
                'coupon_amount' => Null,
                'free_shipping' => 1,
                'product_ids' => Null,
                'delivery_phone	' => NUll,
                'pyment_type' => $request->payment_method,
                'transaction_id ' => NUll,
                'status' => 0,

            ]);

            //    echo $order->id;
            //    die;

            $countery = $ipdat->geoplugin_countryName;


            Order_product::create([
                'orders_id' => $order->id,
                'products_id' => $cartdetails->product[0]->id,
                'products_name' =>  $cartdetails->product[0]->products_name,
                'products_price' =>  $cartdetails->product[0]->products_price,
                'products_image' => $images->name,
                'final_price' => $cartdetails->product_price,
                'products_tax' => 0,
                'products_quantity' => $cartdetails->quantity,

            ]);

            Notification::create([
                'user_id' => auth::user()->id,
                'product_id' => $cartdetails->product[0]->id,
                'order_id' =>  $order->id,
                'product_name' =>  $cartdetails->product[0]->products_name,
                'quantity' => $cartdetails->quantity,
                'price' => $cartdetails->product_price,
            ]);



            $Product  = Product::where('id', $cartdetails->product[0]->id)->first();

            $quantity = $Product->products_quantity - $cartdetails->quantity;

            $Product->update([
                'products_quantity' => $quantity,
                'products_max_stock' => $quantity,
            ]);

            Cart::where('id', $cartdetails->id)->update(['status' => 1]);

            if ($request->payment_method == "pay") {
                $orderid = $order->id;
                return view('user.rezolpay.index', compact('carttotal', 'orderid', 'request', 'order', 'countery'));
            }


            session()->put('success', 'order complete.');
        

            return view('user.successorder.index');
        }
        return view('user.buycheckout.index', compact('address', 'cartdetails', 'conteries', 'carttotal', 'images'));
    }

    public function rezolpay(Request $request)
    {
        if ($request->isMethod('POST')) {

            Order::where('id', $request->orderid)->update(['transaction_id' => $request->id], ['status' => 1]);
            

            return response()->json(['request' => $request]);
        }
    }
    public function success()
    {






        session()->put('success', 'order complete.');

        Cart::where('user_id', auth::user()->id)->update(['status' => 1]);

        return view('user.successorder.index');
    }

    public function buyproductdelete($id)
    {
        Cart::where('id', $id)->delete();


        return redirect()->route('user.dashboard');
    }
}
