<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Categorie;

class CategorieController extends Controller
{

    public function Categorie()
    {
        $categories  =  Categorie::all();
        $Manufacturers  =  Manufacturer::all();

        return view('admin.Categorie.index', compact('categories', 'Manufacturers'));
    }

    public function Categorieadd(Request $request)
    {
        $manufacturers  =  Manufacturer::all();
        if ($request->isMethod('POST')) {
            $request->validate([
                'manufacturers_id' => 'required ',
                'categorie_name' => 'required',
                'categorie_image' => 'required',
                'status' => 'required',

            ]);

            $file = $request->file('categorie_image');



            $path = public_path('images\categorie');


            $filename = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();

            $newFileName = uniqid() . time() . '.' . $fileExtension;
            $file->move($path, $newFileName);

            $categorie = Categorie::create([

                'manufacturers_id' => $request['manufacturers_id'],
                'categorie_name' => $request['categorie_name'],
                'categorie_image' => $request['categorie_image'],
                'status' => $request['status'],
            ]);
            Categorie::where('id', $categorie->id)->update(['categorie_image' => $newFileName]);

            return  redirect()->route('admin.Categorie');
        }
        return view('admin.Categorie.add', compact('manufacturers'));
    }

    public function Categorieedit(Request $request, $id)
    {
        $categorie  =  Categorie::find($id);
        $Manufacturers  =  Manufacturer::all();

        if ($request->isMethod('POST')) {
            $request->validate([
                'manufacturers_id' => 'required ',
                'categorie_name' => 'required',
                'status' => 'required',

            ]);

            if (!empty($request->file('categorie_image'))) {

                $image_path = public_path("images\categorie/{$categorie->manufacturer_image}");
                if (Categorie::exists($image_path)) {

                    //File::delete($image_path);
                    //  unlink($image_path);
                }

                $file = $request->file('categorie_image');
                $path = public_path('images\categorie');

                $fileName = $file->getClientOriginalName();

                $fileExtension = $file->getClientOriginalExtension();
                $newFileName = uniqid() . time() . '.' . $fileExtension;
                $file->move($path, $newFileName);
                $categorie->update(['categorie_image' => $newFileName]);
            }
            $categorie->update([
                'manufacturers_id' => $request->manufacturers_id,
                'categorie_name' => $request->categorie_name,
                'status' => $request->status,
            ]);

            return  redirect()->route('admin.Categorie');
        }

        return view('admin.Categorie.edit', compact('categorie', 'Manufacturers'));
        //    / return view('admin.Categorie.edit',compact('categorie','Manufacturers'));
    }

    public function Categoriedelete(Request $request, $id)
    {
        Categorie::find($id)->delete();
        return  redirect()->route('admin.Categorie');
    }
}
