<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Categorie;
use App\Models\Product;
use PharIo\Manifest\Manifest;

class ManufacturerController extends Controller
{

    public function Manufacturer()
    {
        $manufacturers  =  Manufacturer::all();

        return view('admin.manufacture.index', compact('manufacturers'));
    }

    public function Manufactureradd(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'manufacturer_name' => 'required | string',
                'manufacturer_image' => 'required',
                'status' => 'required',

            ]);

            $file = $request->file('manufacturer_image');



            $path = public_path('images\manufacturer');


            $filename = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();

            $newFileName = uniqid() . time() . '.' . $fileExtension;
            $file->move($path, $newFileName);

            $Manufacturer = Manufacturer::create([
                'manufacturer_name' => $request['manufacturer_name'],
                'manufacturer_image' => $request['manufacturer_image'],
                'status' => $request['status'],
            ]);
            Manufacturer::where('id', $Manufacturer->id)->update(['manufacturer_image' => $newFileName]);

            return  redirect()->route('admin.Manufacturer');
        }
        return view('admin.manufacture.add',);
    }

    public function Manufactureredit(Request $request, $id)
    {
        $manufacturer  =  Manufacturer::find($id);
        $categories =  Categorie::where('manufacturers_id',$id)->get();
        if ($request->isMethod('POST')) {
            $request->validate([
                'manufacturer_name' => 'required | string',
                'status' => 'required',

            ]);

            if (!empty($request->file('manufacturer_image'))) {

                $image_path = public_path("images\manufacturer/{$manufacturer->manufacturer_image}");
                if (Manufacturer::exists($image_path)) {

                    //File::delete($image_path);
                    //     unlink($image_path);
                }

                $file = $request->file('manufacturer_image');
                $path = public_path('images\manufacturer');

                $fileName = $file->getClientOriginalName();

                $fileExtension = $file->getClientOriginalExtension();
                $newFileName = uniqid() . time() . '.' . $fileExtension;
                $file->move($path, $newFileName);
                $manufacturer->update(['manufacturer_image' => $newFileName]);
            }
            $manufacturer->update([
                'manufacturer_name' => $request->manufacturer_name,
                'status' => $request->status,
            ]);
            foreach($categories as $categorie)
            {
                $categorie->update([
                    'status' => $request->status,
                   
                ]);
            }
            $products =  Product::where('manufacturers_id',$manufacturer->manufacturer_name)->get();
          
            foreach($products as $product)
            {
                $product->update([
                    'products_status' => $request->status,
                   
                ]);
            }
            return  redirect()->route('admin.Manufacturer');
        }


        return view('admin.manufacture.edit', compact('manufacturer'));
    }

    public function Manufacturerdelete(Request $request, $id)
    {
        Manufacturer::find($id)->delete();
        return  redirect()->route('admin.Manufacturer');
    }
}
