<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use COM;
use Illuminate\Support\Facades\auth;
use Reflector;
use Str;
use Whoops\Run;

class ReviewController extends Controller
{

    public function review(Request $request)

    {
        $userproductreview = Review::where('user_id', auth::user()->id)->where('product_id', $request->productid)->first();
        $productreview =  Review::where('product_id', $request->product_id)->get();
        $count =  Review::where('user_id', auth::user()->id)->where('product_id', $request->product_id)->count();

        if ($request->isMethod('POST')) {

            $request->validate([
                'product_id' => 'required',
                'reting' => 'required|max:5',
                'detail' => 'required',

            ]);
            $count =  Review::where('user_id', auth::user()->id)->where('product_id', $request->product_id)->count();
            
            if ($count == 1) {
                $productreview =  Review::where('user_id', auth::user()->id)->where('product_id', $request->product_id)->first();
                $productreview->update([

                    'product_id' => $request->product_id,
                    'user_name' => auth::user()->first_name,
                    'reting' => $request->reting,
                    'detail' => $request->detail,
                    'date' => Carbon::now(),
                ]);
            } else {
                Review::create([
                    'user_id' => auth::user()->id,
                    'product_id' => $request->product_id,
                    'user_name' => auth::user()->first_name,
                    'reting' => $request->reting,
                    'detail' => $request->detail,
                    'date' => Carbon::now(),
                ]);
            }
            $productreviews =  Review::where('product_id', $request->product_id)->get();
            return response(compact('userproductreview', 'productreviews'));
        }
        return response(compact('userproductreview', 'productreviews'));
    }
    // public function productdetail($id)
    // {

    //     $product = Product::with('productimage')->where('id', $id)->first();


    //     return view('user.productdetail.index', compact('product'));
    // }

    // public function buyproduct(Request $request,$id)
    // {

    //     $request->validate([
    //         'quantity' => 'required|min:1',
    //         'price' => 'required',

    //     ]);


    //     $total = $request->quantity * $request->price;
    //     $cart = Cart::create([
    //         'user_id' => auth::user()->id,
    //         'product_id' => $id,
    //         'quantity' => $request->quantity,
    //         'product_price' => $request->price,
    //         'status' => 0,
    //         'total' => $total
    //     ]);
    //   return redirect()->route('user.buycheckout');

    // }
}
