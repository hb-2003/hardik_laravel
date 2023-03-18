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
use App\Models\Review;
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
        $manufacturers = Manufacturer::where('status', 1)->get();
        $categories = Categorie::where('status', 1)->get();
        $attributes = Attribute::where('status', 1)->get();
        $attributesvalues = Attributesvalue::where('status', 1)->get();
        $units = Unit::where('status', 1)->get();

        if ($request->isMethod('POST')) {

            $request->validate([

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


            session()->put('success', 'product add.');
            return  redirect()->route('admin.Product');
        }

        return view('admin.product.add', compact('manufacturers', 'categories', 'attributes', 'attributesvalues', 'units'));
    }

    public function Productedit(Request $request, $id)
    {
        $Product  = Product::where('id', $id)->first();
        $manufacturers = Manufacturer::where('status', 1)->get();
        $manufacture = Manufacturer::where('manufacturer_name', $Product->manufacturers_id)->first();
       
        $categories = Categorie::where('manufacturers_id', $manufacture->id)->where('status', 1)->get();
        $categorie = Categorie::where('categorie_name', $Product->products_type)->first();
        
       
        $attributes = Attribute::where('status', 1)->get();
        $attribute = Attribute::where('name', $Product->attributes_id)->first();
        $attributesvalues = Attributesvalue::where('attribute_id', $attribute->id)->where('status', 1)->get();
        $units = Unit::where('status', 1)->get();


        if ($request->isMethod('POST')) {


            $request->validate([

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
            session()->put('success', 'ediy product success complete.');
            return  redirect()->route('admin.Product');
        }
        
        
        return view('admin.product.edit', compact('Product', 'manufacturers', 'categories', 'attributes','categorie','manufacture', 'attributesvalues', 'units'));
    }

    public function Productdelete(Request $request, $id)
    {



        Product::with('productimages')->where('id', $id)->delete();
        return  redirect()->route('admin.Product');
    }
    public function attributegetdata(Request $request)

    {
        if ($request->isMethod('POST')) {
            $attribute = Attribute::where('name', $request->name)->first();
            $attributesvalue = Attributesvalue::where('attribute_id', $attribute->id)->where('status', 1)->get();


            return response()->json($attributesvalue);
        }
    }
    public function categorie(Request $request)

    {
        if ($request->isMethod('POST')) {

            $manufacture = Manufacturer::where('manufacturer_name', $request->id)->first();
            $categories = Categorie::where('manufacturers_id', $manufacture->id)->where('status', 1)->get();
            return response()->json($categories);
        }
    }
    public function productreview(Request $request, $id)
    {

        $productsreviewcount =  Review::where('product_id', $id)->count();
        $productsreviews  =  Review::where('product_id', $id)->get();

        if ($productsreviewcount == '0') {
            return  redirect()->route('admin.Product');
        }

        $Products  =  Product::with('productimage')->first();
        return  view('admin.product.review', compact('productsreviews', 'productsreviewcount'));
    }
    public function reviewdelete(Request $request, $id)
    {
        $productsreviews  =  Review::where('id', $id)->delete();
        return  redirect()->back();
    }
}
