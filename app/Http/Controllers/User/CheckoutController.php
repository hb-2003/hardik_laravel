<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addresse;
use App\Models\Cart;
use App\Models\Countrie;
use App\Models\State;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use Reflector;
use Str;

class CheckoutController extends Controller
{


    public function checkout(Request $request)
    {
        $address = Addresse::where('user_id', auth::user()->id)->get();
        $carttotal = Cart::where('user_id', auth::user()->id)->where('status', 0)->sum('total');
        $conteries = Countrie::all();
        // echo $address;
        // die;
        $cartdetails = Cart::with('product', 'productimage')->where('user_id', auth::user()->id)->where('status', 0)->get();
        if ($request->isMethod('POST')) {
            $request->validate([
                'billing_name' => 'required',
                'email' => 'required',
                'customers_telephone' => 'required',
                'delivery_street_address' => 'required',
                'billing_suburb' => 'required',
                'billing_city' => 'required',
                'billing_postcode' => 'required',
                'billing_country' => 'required',
                'billing_address_format_id' => 'required',
                'payment_method' => 'required',
                
            ]);
            

            return redirect()->route('user.address');
        }
        return view('user.checkout.index', compact('address', 'cartdetails','conteries','carttotal'));
    }

    public function addressedit(Request $request, $id)
    {
        $address = Addresse::where('id', $id)->first();


        if ($request->isMethod('POST')) {


            $address->update([
                'user_id',
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'suburb' => $request->suburb,
                'postcode' => $request->postcode,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'type' => $request->type,

            ]);
            return redirect()->route('user.address');
        }
        return view('user.address.edit', compact('address'));
    }
}
