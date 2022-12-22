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
            $total = $request->quantity * $request->price;
            $cart =Cart::create([
                'user_id' => auth::user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'product_price' => $request->price,
                'status' => 0,
                'total' => $total
            ]);
            
            $cartscount = Cart::where('user_id',auth::user()->id)->count();
            return response()->json(['cartscount' => $cartscount]);
        }
        
       
    }

    public function Cartcount(Request $request)
    {
       
            
            $cartscount = Cart::where('user_id',auth::user()->id)->count();
            return response()->json(['cartscount' => $cartscount]);
        
        
       
    }
}
