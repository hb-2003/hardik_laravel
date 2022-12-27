<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Conterie;
use App\Models\State;
use Facade\FlareClient\Http\Response;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use Reflector;
use Str;

class ProductController extends Controller
{

    public function productdetail($id)
    {

        $product = Product::with('productimage')->where('id', $id)->first();


        return view('user.productdetail.index', compact('product'));
    }

    public function buyproduct(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;

        
        $total = $request->quantity * $request->price;
        $cart = Cart::create([
            'user_id' => auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'product_price' => $request->price,
            'status' => 0,
            'total' => $total
        ]);

        return Response()->json();
    }
}
