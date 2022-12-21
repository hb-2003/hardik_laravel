<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;

class AttributeController extends Controller

{
    public function Attribute()
    {
        $attributes  =  Attribute::all();

        return view('admin.Attribute.index', compact('attributes'));
    }

    public function Attributeadd(Request $request)
    {
        if ($request->isMethod('POST')) {


            $Manufacturer = Attribute::create([
                'name' => $request['name'],
                
                'status' => $request['status'],
            ]);
        

            return  redirect()->route('admin.Attribute');
        }
        return view('admin.Attribute.add',);
    }

    public function Attributeedit(Request $request, $id)
    {
        $attribute  =  Attribute::find($id);
        if ($request->isMethod('POST')) {


          
            $attribute->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            return  redirect()->route('admin.Attribute');
        }


        return view('admin.Attribute.edit', compact('attribute'));
    }

    public function Attributedelete (Request $request, $id)
    {
        Attribute::find($id)->delete();
        return  redirect()->route('admin.Attribute');
    }
    


}
