<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Review;
use App\Models\State;
use Facade\FlareClient\Http\Response;
use Faker\Provider\ar_JO\Address;
use GuzzleHttp\Handler\Proxy;
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
        $productreviews =  Review::where('product_id', $id)->get();
        $userproductreview = Review::where('user_id', auth::user()->id)->where('product_id', $id)->first();
        $userproductcount = Review::where('user_id', auth::user()->id)->where('product_id', $id)->count();
       

        return view('user.productdetail.index', compact('product','productreviews','userproductreview','userproductcount'));
    }

    public function buyproduct(Request $request,$id)
    {

        $request->validate([
            'quantity' => 'required|min:1',
            'price' => 'required',
            
        ]);
        
      
        
        $total = $request->quantity * $request->price;
        $cart = Cart::create([
            'user_id' => auth::user()->id,
            'product_id' => $id,
            'quantity' => $request->quantity,
            'product_price' => $request->price,
            'status' => 0,
            'total' => $total
        ]);
      return redirect()->route('user.buycheckout');

    }
     
    public function allproduct()
    {
        $products = Product::paginate(12);
        return view('user.products.newproduct',compact('products'));
    }
}
