<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
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
        if ($request->isMethod('POST')) {


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
