<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Attributesvalue;
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

            $request->validate([
                'name' => 'required|string ',
                'status' => 'required',

            ]);
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
        $attributesvalue  =  Attributesvalue::where('attribute_id',$id)->get();
        

        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required|string ',
                'status' => 'required',
            ]);
            $attributesvalues  =  Attributesvalue::where('attribute_id',$id)->get();
         

            $attribute->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            
            foreach($attributesvalues as $attributesvalue)
            {
                $attributesvalue->update([
                    'status' => $request->status,
                   
                ]);
            }
            

            return  redirect()->route('admin.Attribute');
        }

        return view('admin.Attribute.edit', compact('attribute'));
    }

    public function Attributedelete(Request $request, $id)
    {
        Attribute::find($id)->delete();
        return  redirect()->route('admin.Attribute');
    }
}
