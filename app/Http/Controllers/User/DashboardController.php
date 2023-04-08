<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Attribute;
use App\Models\Order_product;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Hash;
use App\Models\Slider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use phpDocumentor\Reflection\Types\Null_;
use Str;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $cookie_name = 'hardik';
        // $cookie_value = 'Hello, hardik!';
        // $cookie_expiry = time() + (60 * 60 * 24 * 30); // Expires in 30 days
        // cookie($cookie_name, $cookie_value, $cookie_expiry);

        // // Retrieve the cookie value
        // $cookie_value = request()->cookie();

        // // Print the cookie value
        // Print_r($cookie_value);
        // die;




        //$productssliders = Product::with('productimage')->latest()->take(5)->get();

        $orders = Order::with('order_product')->where('pyment_type', 'pay')->where('transaction_id', Null)->get();

        foreach ($orders as $order) {
            $order->update([
                'status' => 2,
                'order_status' => 6,
            ]);
            $order_products = Order_product::where('orders_id', $order->id)->get();

            foreach ($order_products as $order_product) {

                $count = Product::where('id', $order_product->products_id)->count();

                if ($count == 1) {

                    $product = Product::where('id', $order_product->products_id)->first();
                    $quantity = $product->products_quantity + $order_product->products_quantity;
                    $product->update([
                        'products_quantity' => $quantity,
                    ]);
                }
            }
        }



        $products = Product::with('productimage')->where('products_status', 1)->paginate(9);



        $categories = Categorie::all();

        $users = User::count();
        $user = auth()->user();
        $referralUrl = URL::to('/') . '/register?referralcode=' . $user->referralcode;
        $sliders = Slider::where('status', 1)->get();
        $sliderscount = Slider::where('status', 1)->count();

        if ($request->isMethod('POST')) {
            if ($request->id) {
                $categorie = Categorie::where('id', $request->id)->first();
                $productscount =  Product::with('productimage')->where('products_type', $categorie->categorie_name)->where('products_status', 1)->count();
                if ($productscount == 0) {
                    return redirect()->route('user.dashboard');
                }

                $products =  Product::with('productimage')->where('products_status', 1)->where('products_type', $categorie->categorie_name)->paginate(9);
                $categoriestatus = $request->id;

                return view('user.dashboard.index', compact('products',  'productssliders', 'categoriestatus', 'categories', 'sliders', 'sliderscount'));
            } else {

                $search = $request->serch;
                $productscount = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->where('products_status', 1)->count();

                if ($productscount == 0) {


                    return redirect()->route('user.dashboard');
                }

                $products = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->where('products_status', 1)->paginate(9);
                $categoriestatus = $request->id;

                return view('user.dashboard.index', compact('products',  'categoriestatus', 'categories', 'sliders', 'sliderscount'));
            }
        }
        $categoriestatus = null;
        return view('user.dashboard.index', ['user' => $user, 'referralUrl' => $referralUrl], compact('users', 'categoriestatus', 'products', 'categories', 'sliders', 'sliderscount'));
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('POST')) {


            $user = auth()->user();
            $user = user::find(auth::user()->id);
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->gender = $request['gender'];
            $user->dob = $request['dob'];

            $user->telephone = $request['telephone'];
            $user->email     = $request['email'];
            $user->update();

            session()->put('success', 'Your profile image data has been updated.');
            return redirect()->route('user.profile');
        }
        if ($request->isMethod('GET')) {
            return view('user.dashboard.profile');
        }
    }

    public function social(Request $request)
    {
        //  echo "<pre>";
        // print_r('request');
        // die;

        return view('user.dashboard.social');
    }

    public function order(Request $request)

    {
        $orders = Order::with('order_product')->where('pyment_type', 'pay')->where('transaction_id', Null)->get();

        foreach ($orders as $order) {
            $order->update([
                'status' => 2,
                'order_status' => 6,
            ]);
            $order_products = Order_product::where('orders_id', $order->id)->get();

            foreach ($order_products as $order_product) {

                $count = Product::where('id', $order_product->products_id)->count();

                if ($count == 1) {

                    $product = Product::where('id', $order_product->products_id)->first();
                    $quantity = $product->products_quantity + $order_product->products_quantity;
                    $product->update([
                        'products_quantity' => $quantity,
                    ]);
                }
            }
        }
        $userorders =  Order::with('order_product')->where('customers_id', auth::user()->id)->orderBy('id', 'ASC')->get();


        return view('user.order.index', compact('userorders'));
    }
    public function account(Request $request)
    {

        return view('user.dashboard.youraccount');
    }

    public function categorieproduct(Request $request, $id)
    {

        $count = Product::with('productimage')->where('products_type', $id)->where('products_status', 1)->count();
        if ($count == 0) {
          
            return redirect()->back();
        }
        $products = Product::with('productimage')->where('products_type', $id)->where('products_status', 1)->paginate(9);

        //  echo "<pre>";
        // print_r($products);
        // die;

        return view('user.productdetail.categorie', compact('products'));
    }
    public function email(Request $request)
    {
        // echo "<pre>";        
        // print_r($request->all());        
        // die; 
        if ($request->isMethod('POST')) {
            $user = auth()->user();
            $data = $request->validate([
                'old_email' => 'required|string|email|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id . ',id,deleted_at,NULL',
            ]);
            if ($data['old_email'] == $user->email) {
                $user->update($data);
                session()->put('success', 'Your email address has been changed successfully.');
            } else {
                session()->put('error', 'Please enter correct current old email address.');
            }
            return redirect()->route('user.email');
        }
        if ($request->isMethod('GET')) {
            return view('user.dashboard.email');
        }
    }

    public function notification(Request $request)
    {
        return view('user.dashboard.notification');
    }

    public function change_pass(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'old_password' => 'required|min:8|max:15',
                'password' => 'required|min:8|max:15|confirmed',
            ]);

            $user = auth()->user();
            if (Hash::check($data['old_password'], $user->password)) {
                $user->password = Hash::make($data['password']);
                $user->save();
                session()->put('success', 'Your password has been changed successfully.');
            } else {
                session()->put('error', 'Please enter correct current password.');
            }
            return redirect()->route('user.change_pass');
        }
        if ($request->isMethod('GET')) {
            return view('user.dashboard.change_pass');
        }
    }

    public function search(Request $request)
    {


        $search = $request->input('search');
        $productscount = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->count();
        if ($productscount == 0) {
            session()->put('success', 'This categorie is not avalebale.');
            return redirect()->back();
        }
        $products = Product::query()->where('products_name', 'LIKE', "%{$search}%")->orwhere('attributes_set', 'LIKE', "%{$search}%")->orwhere('is_current', 'LIKE', "%{$search}%")->orwhere('products_price', 'LIKE', "%{$search}%")->orwhere('products_type', 'LIKE', "%{$search}%")->latest()->paginate(9);


        return view('user.search.index', compact('products', 'productscount', 'search'));
    }
    public function product(Request $request)

    {
        $categories  = Categorie::where('status', 1)->get();
        $products = Product::with('productimage')->where('products_status', 1)->paginate(9);
        $attributes = Attribute::with('attributevalue')->where('status', 1)->get();
        if ($request->isMethod('POST')) {

            $category = explode(",", $request->input('category'));
            echo $category;
            die;


            // $attributesvalue = implode(",", $request->attributevalue);




            $products = Product::whereIn('products_type', [$category])->get();
            echo $products;
            die;
            return view('user.products.index', compact('products', 'categories', 'attributes'));
        }


        return view('user.products.index', compact('products', 'categories', 'attributes'));
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

            return redirect()->route('User.dashboard');
        }
    }
}
