<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addresse;
use App\Models\Cart;
use App\Models\Conterie;
use App\Models\State;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use Reflector;
use Str;

class CartController extends Controller
{

    public function Cart(Request $request)
    {
        if ($request->isMethod('POST')) {


            $countproduct = Cart::where('product_id', $request->product_id)->count();
            if ($countproduct == 1) {
                $product =  Cart::where('product_id', $request->product_id)->first();
                $totalquantity = $request->quantity + $product->quantity;
                $totalprice  = $totalquantity * $request->price;

                $product->update([
                    'user_id' => auth::user()->id,
                    'product_id' => $request->product_id,
                    'quantity' => $totalquantity,
                    'product_price' => $request->price,
                    'status' => 0,
                    'total' => $totalprice,

                ]);
            } else {
                $total = $request->quantity * $request->price;
                $cart = Cart::create([
                    'user_id' => auth::user()->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'product_price' => $request->price,
                    'status' => 0,
                    'total' => $total
                ]);
            }



            $cartscount = Cart::where('user_id', auth::user()->id)->sum('quantity');
            return response()->json(['cartscount' => $cartscount]);
        }
    }

    public function Cartcount(Request $request)
    {


        $cartscount = Cart::where('user_id', auth::user()->id)->count();
        return response()->json(['cartscount' => $cartscount]);
    }
    public function Cartdetail(Request $request)
    {


        $cartdetails = Cart::with('product', 'productimage')->where('user_id', auth::user()->id)->where('status', 0)->get();
        $total = Cart::where('user_id', auth::user()->id)->sum('total');
        // foreach ($cartdetails as $cartdetail) {
        //     echo $cartdetail->product[0]->attributes_set;
        // }
        // die;
        return    view('user.cart.index', compact('cartdetails','total'));
    }
}
