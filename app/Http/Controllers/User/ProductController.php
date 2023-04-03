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

    $product = Product::with('productimage')->where('id', $id)->where('products_status', 1)->first();

    $productreviews =  Review::where('product_id', $id)->get();
    $userproductreview = Review::where('user_id', auth::user()->id)->where('product_id', $id)->first();
    $userproductcount = Review::where('user_id', auth::user()->id)->where('product_id', $id)->count();
    $products = Product::with('productimage')->where('products_type', $product->products_type)->where('products_status', 1)->get();

    $userproductretingsum = Review::where('user_id', auth::user()->id)->where('product_id', $id)->sum('reting');
    if ($userproductcount == 0) {
      $avreagereview = "0";
    } else {
      $avreagereview =  $userproductretingsum / $userproductcount;
    }

    return view('user.productdetail.index', compact('product', 'productreviews', 'userproductreview', 'userproductcount', 'avreagereview', 'products'));
  }

  public function buyproduct(Request $request, $id)
  {

    $request->validate([
      'quantity' => 'required|min:1',
      'price' => 'required',

    ]);

    $product =  Product::where('id', $id)->where('products_status', 1)->first();
    $price = "0";
    if ($product->Products_categorie == 3) {
      $price = $product->sale_price;
    } else {
      $price =  $product->products_price;
    }

    $total = $request->quantity * $price;

    $cart = Cart::create([
      'user_id' => auth::user()->id,
      'product_id' => $id,
      'quantity' => $request->quantity,
      'product_price' => $price,
      'status' => 0,
      'total' => $total
    ]);

    return redirect()->route('user.buycheckout', $cart->id);
  }

  public function allproduct()
  {
    $products = Product::where('products_status', 1)->get();
    return view('user.products.newproduct', compact('products'));
  }
}
