<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Attributesvalue;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class AttributevlaueController extends Controller
{
    public function Attributevlaue()
    {
        $attributesvalues  =  attributesvalue::all();
        $attributes  =  Attribute::all();

        return view('admin.Attributevalue.index', compact('attributesvalues','attributes'));
    }

    public function Attributevlaueadd(Request $request)
    {
        $attributes  =  Attribute::all();
        if ($request->isMethod('POST')) {

            $request->validate([
                'attribute_id' => 'required ',
                'name' => 'required ',
                'status' => 'required',
            ]);

            $attributesvalues = Attributesvalue::create([

                'attribute_id' => $request['attribute_id'],
                'name' => $request['name'],
                'status' => $request['status'],
            ]);

            return  redirect()->route('admin.Attributevlaue');
        }
        return view('admin.Attributevalue.add', compact('attributes'));
    }

    public function Attributevlaueedit(Request $request, $id)
    {
        $attributesvalue  =  Attributesvalue::find($id);
        $attributes  =  Attribute::all();

        if ($request->isMethod('POST')) {
            $request->validate([
                'attribute_id' => 'required ',
                'name' => 'required ',
                'status' => 'required',
            ]);

            $attributesvalue->update([
                'attribute_id' => $request->attribute_id,
                'name' => $request->name,
                'status' => $request->status,
            ]);

            return  redirect()->route('admin.Attributevlaue');
        }

        return view('admin.Attributevalue.edit', compact('attributes', 'attributesvalue'));
        //    / return view('admin.Categorie.edit',compact('categorie','Manufacturers'));
    }

    public function Attributevlauedelete(Request $request, $id)
    {
        Attributesvalue::find($id)->delete();
        return  redirect()->route('admin.Attributevlaue');
    }
    
}
