<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\User;

class UserController extends Controller
{


    public function user()
    {
        $users  =  User::all();

        return view('admin.user.index', compact('users'));
    }

    public function Unitadd(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'units_name' => 'required ',
                'status' => 'required',

            ]);
            Unit::create([
                'units_name' => $request['units_name'],
                'status' => $request['status'],
            ]);


            return  redirect()->route('admin.Unit');
        }
        return view('admin.Unit.add',);
    }

    public function Unitedit(Request $request, $id)
    {
        $unit  =  Unit::find($id);

        if ($request->isMethod('POST')) {
            $request->validate([
                'units_name' => 'required ',
                'status' => 'required',

            ]);
            $unit->update([
                'units_name' => $request->units_name,
                'status' => $request->status,
            ]);

            return  redirect()->route('admin.Unit');
        }

        return view('admin.Unit.edit', compact('unit'));
    }

    public function Unitdelete(Request $request, $id)
    {
        Unit::find($id)->delete();
        return  redirect()->route('admin.Unit');
    }
}
