<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Unit;

class SliderController extends Controller
{


    public function slider()
    {
        $sliders  =  Slider::all();

        return view('admin.Slider.index', compact('sliders'));
    }

    public function slideradd(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required| string ',
                'status' => 'required',

            ]);
            $file = $request->file('name');



            $path = public_path('images\slider');


            $filename = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();

            $newFileName = uniqid() . time() . '.' . $fileExtension;
            $file->move($path, $newFileName);
            
            $slider = Slider::create([
                'name' => $request['name'],
                'status' => $request['status'],
            ]);
            Slider::where('id', $slider->id)->update(['name' => $newFileName]);


            return  redirect()->route('admin.slider');
        }
        return view('admin.slider.add',);
    }

    public function slideredit(Request $request, $id)
    {
        $slider  =  Slider::find($id);

        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required| string ',
                'status' => 'required',

            ]);
            $slider->update([
                'name' => $request->namwe,
                'status' => $request->status,
            ]);

            return  redirect()->route('admin.slider');
        }

        return view('admin.slider.edit', compact('slider'));
    }

    public function sliderdelete(Request $request, $id)
    {
        Slider::find($id)->delete();
        return  redirect()->route('admin.slider');
    }
}
