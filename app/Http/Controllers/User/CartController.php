<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addresse;
use App\Models\Cart;
use App\Models\Conterie;
use App\Models\Product;
use App\Models\State;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use phpDocumentor\Reflection\Types\Null_;
use Reflector;
use Str;

class CartController extends Controller
{

    public function Cart(Request $request)
    {
        if ($request->isMethod('POST')) {

            if (auth::user()->id == NUll) {
                return redirect()->route('login');
            }
            $countproduct = Cart::where('product_id', $request->product_id)->where('user_id', auth::user()->id)->where('status', 0)->count();
            if ($countproduct == 1) {

                $product =  Cart::where('product_id', $request->product_id)->where('user_id', auth::user()->id)->where('status', 0)->first();
                $price = "0";
                if ($product->Products_categorie == 3) {
                    $price = $product->sale_price;
                } else {
                    $price =  $product->products_price;
                }


                // if($product->quantity  <= $request->quantity )
                // {

                //     $cartscount = Cart::where('user_id', auth::user()->id)->sum('quantity');
                //     return response()->json(['cartscount' => $cartscount]);
                // }
                $totalquantity = $request->quantity + $product->quantity;
                $totalprice  = $totalquantity * $request->price;

                $product->update([
                    'user_id' => auth::user()->id,
                    'product_id' => $request->product_id,
                    'quantity' => $totalquantity,
                    'product_price' => $price,
                    'status' => 0,
                    'total' => $totalprice,

                ]);
            } else {
                $product =  Product::where('id', $request->product_id)->first();
                $price = "0";
                if ($product->Products_categorie == 3) {
                    $price = $product->sale_price;
                } else {
                    $price =  $product->products_price;
                }
                $total = $request->quantity *$price;
                $cart = Cart::create([
                    'user_id' => auth::user()->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'product_price' => $price,
                    'status' => 0,
                    'total' => $total
                ]);
            }

            $cartscount = Cart::where('user_id', auth::user()->id)->where('status', 0)->sum('quantity');
            return response()->json(['cartscount' => $cartscount]);
        }
    }

    public function Cartcount(Request $request)
    {


        $cartscount = Cart::where('user_id', auth::user()->id)->where('status', 0)->count();

        return response()->json(['cartscount' => $cartscount]);
    }
    public function Cartdetail(Request $request)
    {
        $count =  Cart::with('product', 'productimage')->where('user_id', auth::user()->id)->where('status', 0)->count();

        // echo $count;
        // die;
        // if ($count  ==  0) {
        //     session()->put('success', 'cart in not preo complete.');
        //     return redirect()->route('user.dashboard');
        // }

        $cartdetails = Cart::with('product', 'productimage')->where('user_id', auth::user()->id)->where('status', 0)->get();

        $total = Cart::where('user_id', auth::user()->id)->where('status', 0)->sum('total');
        // foreach ($cartdetails as $key=> $cartdetail) {
        //     echo $cartdetail->product[$key]->attributes_set;
        // }
        // die;
        return    view('user.cart.index', compact('cartdetails', 'total', 'count'));
    }

    public function Cartdelete(Request $request, $id)
    {
        Cart::where('id', $id)->where('user_id', auth::user()->id)->where('status', 0)->delete();
        $count =  Cart::with('product', 'productimage')->where('user_id', auth::user()->id)->where('status', 0)->count();
        return    redirect()->route('user.cartdetail');
    }
}
