<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addresse;
use App\Models\Citie;
use App\Models\Countrie;
use App\Models\State;
use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\auth;
use Reflector;
use Str;

class AddressController extends Controller
{
    function getVisIpAddr()
    {

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    public function address()
    {

        $address = Addresse::where('user_id', auth::user()->id)->get();

        return view('user.address.index', compact('address'));
    }

    public function addressadd(Request $request)
    {
        $ip = '$_SERVER["HTTP_CF_CONNECTING_IP"]';

        // Use JSON encoded string and converts
        // it into a PHP variable
        $ipdat = @json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $ip
        ));
        // echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n";
        // echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";


        $countrie = Countrie::where('name', $ipdat->geoplugin_countryName)->first();
        $cities = Citie::where('country_id', $countrie->id)->get();

        if ($request->isMethod('POST')) {


            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'suburb' => 'required',
                'postcode' => 'required',
                'city' => 'required|unique:Citie',
                'type' => 'required',
            ]);

            $city = Citie::where('name', $request->city)->count();

            if ($city == 0) {
                session()->put('error', 'ediy product success complete.');
                return redirect()->back();
            }


            $city = Citie::where('name', $request->city)->first();



            $state = State::where('id', $city->state_id)->first();
            $countrie = Countrie::where('id', $city->country_id)->first();



            Addresse::create([
                'user_id' => auth::user()->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'suburb' => $request->suburb,
                'postcode' => $request->postcode,
                'city' => $request->city,
                'state' => $state->name,
                'country' => $countrie->name,
                'type' => $request->type,

            ]);

            return redirect()->route('user.address');
        }

        return view('user.address.add', compact('cities'));
    }

    public function addressedit(Request $request, $id)
    {
        $address = Addresse::where('id', $id)->first();
        $ip = '$_SERVER["HTTP_CF_CONNECTING_IP"]';

        // Use JSON encoded string and converts
        // it into a PHP variable
        $ipdat = @json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $ip
        ));
        // echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n";
        // echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";


        $countrie = Countrie::where('name', $ipdat->geoplugin_countryName)->first();
        $cities = Citie::where('country_id', $countrie->id)->get();

        if ($request->isMethod('POST')) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'suburb' => 'required',
                'postcode' => 'required',
                'city' => 'required',
                'type' => 'required',
            ]);


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
            return redirect()->back();
        }
        return view('user.address.edit', compact('address','cities'));
    }

    public function addressdelete(Request $request, $id)
    {
        Addresse::where('id', $id)->delete();
        return redirect()->route('user.address');
    }
}
