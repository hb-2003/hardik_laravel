<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Citie;
use App\Models\Conterie;
use App\Models\State;
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

    
}
