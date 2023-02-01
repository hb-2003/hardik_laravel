<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use File;
use App\Models\Order;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Cart;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\auth;
use Image;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    public function index()
    {
        $productssliders = Product::with('productimage')->latest()->take(5)->get();


        $products = Product::with('productimage')->paginate(12);

        //        $request->authenticate();


        // $request->session()->regenerate();

        // if ($request->user()->role == 1) {
        //     return redirect(RouteServiceProvider::ADMIN_HOME);
        // } else {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        $categories = Categorie::all();
        // session()->put('success','success!');
        // session()->put('error','error!');
        return view('frontend.home.index', compact('products', 'categories', 'productssliders'));
    }
    public function loginrequest(LoginRequest $request)
    {
        $productssliders = Product::with('productimage')->latest()->take(5)->get();


        $products = Product::with('productimage')->paginate(12);

        // $request->authenticate();




        // if ($request->session()->regenerate() == Null) {
        //     echo "hiiii";
        // } else {
        //     echo "hardik";
        // }
        // die;
        // $request->session()->regenerate();

        // if ($request->user()->role == 1) {
        //     return redirect(RouteServiceProvider::ADMIN_HOME);
        // } else {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        $categories = Categorie::all();
        // session()->put('success','success!');
        // session()->put('error','error!');
        return view('frontend.home.index', compact('products', 'categories', 'productssliders'));
    }
    public function file($url, $url1 = '', $name = '', Request $request)
    {
        $path = $url . '/' . $url1;
        if ($name != '') {
            $path .= '/' . $name;
        }
        $path = public_path($path);
        if (!File::exists($path)) {
            return abort(404);
        }
        if ($request->download) {
            return response()->download($path, $request->download);
        } else {
            if ($request->w && $request->h) {
                $img = Image::make($path);
                $img->resize($request->w, $request->h, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                if ($request->type) {
                    return $img->encode($request->type, 75)->response()->header('Cache-Control', 'max-age=31536000');
                } else {
                    return $img->response()->header('Cache-Control', 'max-age=31536000');
                }
            } else {
                $file = File::get($path);
                return response($file)->header("Content-Type", File::mimeType($path))->header('Cache-Control', 'max-age=31536000');
            }
        }
    }
    public function productdetail($id)
    {

        $product = Product::with('productimage')->where('id', $id)->first();
        $productreviews =  Review::where('product_id', $id)->get();
        $userproductreview = Review::where('product_id', $id)->first();
        $userproductcount = Review::where('product_id', $id)->count();
        $userproductretingsum = Review::where('product_id', $id)->sum('reting');

        $avreagereview =  $userproductretingsum / $userproductcount;



        return view('frontend.productdetail.index', compact('product', 'productreviews', 'userproductreview', 'userproductcount', 'avreagereview'));
    }

    public function Cart(Request $request)
    {
        if ($request->isMethod('POST')) {


        
           
            return response()->json();
        }
    }
}
