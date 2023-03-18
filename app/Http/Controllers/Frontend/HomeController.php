<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use File;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Attribute;
use App\Models\Attributesvalue;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Contectus;

use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Manufacturer;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Cookie;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\auth;
use Image;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        // return view('pages.maintenance');
        //return view('pages.comingsoon');
        $productssliders = Product::with('productimage')->latest()->take(5)->get();

        $categories = Categorie::all();

        $products = Product::with('productimage')->paginate(9);
        $sliders = Slider::where('status', 1)->get();
        $sliderscount = Slider::where('status', 1)->count();

        //        $request->authenticate();
        if ($request->isMethod('POST')) {
            if ($request->id) {
                $categorie = Categorie::where('id', $request->id)->first();
                $productscount =  Product::with('productimage')->where('products_type', $categorie->categorie_name)->count();
                if ($productscount == 0) {
                    return redirect()->route('home');
                }

                $products =  Product::with('productimage')->where('products_type', $categorie->categorie_name)->paginate(9);
                $categoriestatus = $request->id;

                return view('frontend.home.index', compact('products',  'productssliders', 'categoriestatus', 'categories', 'sliders', 'sliderscount'));
            } else {

                $search = $request->serch;
                $productscount = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->count();

                if ($productscount == 0) {


                    return redirect()->route('home');
                }

                $products = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->paginate(9);
                $categoriestatus = $request->id;

                return view('frontend.home.index', compact('products',  'productssliders', 'categoriestatus', 'categories', 'sliders', 'sliderscount'));
            }
        }

        // $request->session()->regenerate();

        // if ($request->user()->role == 1) {
        //     return redirect(RouteServiceProvider::ADMIN_HOME);
        // } else {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        $categoriestatus = null;
        // session()->put('success','success!');
        // session()->put('error','error!');
        return view('frontend.home.index', compact('products', 'categories', 'productssliders', 'categoriestatus', 'sliders', 'sliderscount'));
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
        if ($userproductcount == 0) {
            $avreagereview = "0";
        } else {
            $avreagereview =  $userproductretingsum / $userproductcount;
        }




        return view('frontend.productdetail.index', compact('product', 'productreviews', 'userproductreview', 'userproductcount', 'avreagereview'));
    }
    public function Cart(Request $request)
    {
        if ($request->isMethod('POST')) {

            // $product =  Cart::with('productimage')->where('product_id', $request->product_id)->where('status', 0)->first();

            // if ($product->products_quantity >= $request->quantity) {
            //     session()->put('error', 'This Product Quantity is not avelabale!');
            //     return redirect()->route('productdetail', $request->product_id);
            // }

            // $productname = $product->products_name;
            // $productprice = $product->products_price;
            // $productimage = $product->productimage[0]->name;

            // if ($product) {
            //     $cartarray = array(
            //         'name' => $productname,
            //         'price' => $productname,
            //         'image' => $productname,
            //         'qyantity' => $productname

            //     );
            //     $cartdata = $cartarray;
            //     $minutes = 60;
            //     Cookie::queue(Cookie::make('shooping_cart',$cartdata, $minutes,));
            // }



            return response()->json();
        }
    }
    public function categorie(Request $request, $id)
    {



        $count = Product::with('productimage')->where('products_type', $id)->count();
        if ($count == 0) {
            session()->put('success', 'Your email address has been changed successfully.');
            return redirect()->back();
        }
        $products = Product::with('productimage')->where('products_type', $id)->paginate(12);

        //  echo "<pre>";
        // print_r($products);
        // die;

        return view('frontend.productdetail.categorie', compact('products'));
    }
    public function contectus(Request $request)
    {
        if ($request->isMethod('POST')) {


            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',

            ]);

            $cart = Contectus::create([
                'user_id' => auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,

            ]);
            $data = ['name' => $request['name'], 'data' => $request['message']];
            $user['to'] = 'hardikbhanderi9898@gmail.com';
            $user['subject'] = $request['subject'];
            Mail::send('mail', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject($user['subject']);
            });
            return  redirect()->route('user.dashboard');
        }
        return  view('frontend.contectus.index');
    }
    public function product(Request $request)
    { $attributes= Attribute::with('attributevalue')->where('status',1)->paginate(2);
        $products = Product::with('productimage')->paginate(9);

        $manufatures= Manufacturer::with('categorie')->where('status',1)->get();
        if ($request->isMethod('POST')) {
            $search = $request->serch;
            $productscount = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->count();

            if ($productscount == 0) {


                return redirect()->route('home');
            }

            $products = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->paginate(9);

            return view('frontend.products.index', compact('products'));
        }
        return view('frontend.products.index', compact('products','attributes','manufatures'));
    }
    public function search(Request $request)
    {



        $search = $request->input('search');
        $productscount = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->count();
        if ($productscount == 0) {
            session()->put('success', 'This categorie is not avalebale.');
            return redirect()->back();
        }
        $products = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->latest()->paginate();


        return view('Frontend.search.index', compact('products', 'productscount', 'search'));
    }

    public function aboutus(Request $request)
    {

        return  view('Frontend.about us.index');
    }
    public function faqs(Request $request)
    {

        return  view('Frontend.faqs.index');
    }
    public function subscribe(Request $request)
    {

        if ($request->isMethod('POST')) {


            $request->validate([
                'email' => 'required|email',
            ]);
            $email = $request->email;

            $subscribecount =  Subscribe::where('email', $email)->count();
            if ($subscribecount == 1) {
                session()->put('error', 'Email is a already exits!');
                return redirect()->back();
            }
            Subscribe::create(['email' => $email]);
            session()->put('success', 'Thank for Subsciber');

            return redirect()->route('home');
        }
    }
}
