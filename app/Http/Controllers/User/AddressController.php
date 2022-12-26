<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addresse;
use App\Models\Citie;
use App\Models\Conterie;
use App\Models\State;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use Reflector;
use Str;

class AddressController extends Controller
{

    public function address()
    {

        $address = Addresse::where('user_id', auth::user()->id)->get();

        return view('user.address.index', compact('address'));
    }

    public function addressadd(Request $request)
    {
        // $conterys = Conterie::all();

        // $states =  State::all();

        if ($request->isMethod('POST')) {
        
            Addresse::create([
                'user_id'=>auth::user()->id,
                 'first_name'=> $request->first_name,
                 'last_name'=> $request->last_name, 
                 'address'=> $request->address, 
                 'suburb'=> $request->suburb,
                 'postcode'=> $request->postcode,
                  'city'=> $request->city,
                   'state'=> $request->state,
                    'country'=> $request->country,
                    'type'=> $request->type,
               
            ]);

            return redirect()->route('user.address');
        }
        return view('user.address.add');
    }

    public function addressedit(Request $request, $id)
    {
        $address = Addresse::where('id', $id)->first();


        if ($request->isMethod('POST')) {


            $address->update([
                'user_id',
                 'first_name'=> $request->first_name,
                 'last_name'=> $request->last_name, 
                 'address'=> $request->address, 
                 'suburb'=> $request->suburb,
                 'postcode'=> $request->postcode,
                  'city'=> $request->city,
                   'state'=> $request->state,
                    'country'=> $request->country,
                    'type'=> $request->type,
               
            ]);
            return redirect()->back();
        }
        return view('user.address.edit', compact('address'));
    }

    public function addressdelete(Request $request, $id)
    {
        Addresse::where('id', $id)->delete();
        return redirect()->route('user.address');
    }
}
