<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products_images;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\Categorie;
use App\Models\Attribute;
use App\Models\Attributesvalue;
use App\Models\Unit;


class ProductController extends Controller
{
    public function Product()
    {
        $Products  =  Product::with('productimage')->get();

        return view('admin.product.index', compact('Products'));
    }

    public function Productadd(Request $request)
    {
        $manufacturers = Manufacturer::all();
        $categories = Categorie::all();
        $attributes = Attribute::all();
        $attributesvalues = Attributesvalue::all();
        $units = Unit::all();

        if ($request->isMethod('POST')) {

            $request->validate([
                'units_name' => 'required ',
                'status' => 'required',
                'attributes_id' => 'required',
                'attributes_set' => 'required',
                'products_name' => 'required',
                'products_quantity' => 'required',
                'products_price' => 'required',
                'products_weight' => 'required',
                'products_weight_unit' => 'required',
                'products_status' => 'required',
                'is_current' => 'required',
                'manufacturers_id' => 'required',
                'products_type' => 'required',
                'products_min_order' => 'required',
                'products_max_stock' => 'required',

            ]);

            $product = Product::create([

                'attributes_id' => $request->attributes_id,
                'attributes_set' => $request->attributes_set,
                'products_name' => $request->products_name,
                'products_quantity' => $request->products_quantity,
                'products_price' => $request->products_price,
                'products_weight' => $request->products_weight,
                'products_weight_unit' => $request->products_weight_unit,
                'products_status' => $request->products_status,
                'is_current' => $request->is_current,
                'manufacturers_id' => $request->manufacturers_id,
                'products_type' => $request->products_type,

                'products_min_order' => $request->products_min_order,
                'products_max_stock' => $request->products_min_order,
            ]);

            $input = $request->all();
            $images = $input['products_image'];

            foreach ($images as $image) {
                $file = $image->getClientOriginalName();
                $destinationPath = public_path('images/product');
                $fileExtension = $image->getClientOriginalExtension();
                $newFileName = uniqid() . time() . '.' . $fileExtension;
                $image->move($destinationPath, $newFileName);

                $user = Products_images::create(['product_id' => $product->id, 'name' => $newFileName]);
                Products_images::where('id', $user->id)->update(['name' => $newFileName]);
            }



            return  redirect()->route('admin.Product');
        }

        return view('admin.product.add', compact('manufacturers', 'categories', 'attributes', 'attributesvalues', 'units'));
    }

    public function Productedit(Request $request, $id)
    {

        $manufacturers = Manufacturer::all();
        $categories = Categorie::all();
        $attributes = Attribute::all();
        $attributesvalues = Attributesvalue::all();
        $units = Unit::all();
        $Product  = Product::where('id', $id)->first();

        if ($request->isMethod('POST')) {

            $request->validate([
                'units_name' => 'required ',
                'status' => 'required',
                'attributes_id' => 'required',
                'attributes_set' => 'required',
                'products_image' => 'required',
                'products_name' => 'required',
                'products_quantity' => 'required',
                'products_price' => 'required',
                'products_weight' => 'required',
                'products_weight_unit' => 'required',
                'products_status' => 'required',
                'is_current' => 'required',
                'manufacturers_id' => 'required',
                'products_type' => 'required',
                'products_min_order' => 'required',
                'products_max_stock' => 'required',

            ]);
            if (!empty($request->products_image)) {
                Products_images::where('product_id', $Product->id)->delete();
                $images = $request->products_image;

                foreach ($images as $image) {
                    $file = $image->getClientOriginalName();
                    $destinationPath = public_path('images/product');
                    $fileExtension = $image->getClientOriginalExtension();
                    $newFileName = uniqid() . time() . '.' . $fileExtension;
                    $image->move($destinationPath, $newFileName);

                    $user = Products_images::create(['product_id' => $Product->id, 'name' => $newFileName]);
                    Products_images::where('id', $user->id)->update(['name' => $newFileName]);
                }
            }

            $Product->update([
                'attributes_id' => $request->attributes_id,
                'attributes_set' => $request->attributes_set,
                'products_name' => $request->products_name,
                'products_quantity' => $request->products_quantity,
                'products_price' => $request->products_price,
                'products_weight' => $request->products_weight,
                'products_weight_unit' => $request->products_weight_unit,
                'products_status' => $request->products_status,
                'is_current' => $request->is_current,
                'manufacturers_id' => $request->manufacturers_id,
                'products_type' => $request->products_type,

                'products_min_order' => $request->products_min_order,
                'products_max_stock' => $request->products_min_order,
            ]);

            return  redirect()->route('admin.Product');
        }
        return view('admin.product.edit', compact('Product', 'manufacturers', 'categories', 'attributes', 'attributesvalues', 'units'));
    }

    public function Productdelete(Request $request, $id)
    {



        Product::with('productimages')->where('id', $id)->delete();
        return  redirect()->route('admin.Product');
    }
}
