@extends('layouts.admin.app')

@section('title', 'content')

@section('css')
@endsection

@section('style')
@endsection

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-rgb(52,58,64)">
                        <div class="card-header">
                            <h3 class="card-title">Edit Detail</h3>
                        </div>
                        <form accept="{{route('admin.Productedit',$Product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Manufacturer</label>
                                    <select class="form-control" id="manufacturers_id" name="manufacturers_id" require>
                                        <option value=""> select plasea</option>
                                        @foreach($manufacturers as $manufacturer)
                                        <option value=" {{$manufacturer ->manufacturer_name}}" <?php echo  $Product->manufacturers_id == $manufacturer->manufacturer_name ? "selected" : "" ?>> {{$manufacturer ->manufacturer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Categorie</label>
                                    <select class="form-control" name="products_type" require>
                                        <option value=""> select plasea</option>
                                        @foreach($categories as $categorie)
                                        <option value=" {{$categorie ->categorie_name}}" <?php echo  $Product->products_type == $categorie->categorie_name ? "selected" : "" ?>>
                                            {{$categorie ->categorie_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="products_name" value="{{$Product->products_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name" require>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" value="" multiple="multiple" name="products_image[]" id="exampleInputFile" class=" form-control">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <img src="{{asset('images/product/'.$Product->productimage[0]->name)}}" width="10%" alt="...">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantity</label>
                                    <input type="number" value="{{$Product->products_quantity}}" name="products_quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter email" require>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="number" value="{{$Product->products_price}}" name="products_price" class="form-control" id="exampleInputEmail1" placeholder="Enter email" require>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Weight</label>
                                    <input type="number" value="{{$Product->products_weight}}" name="products_weight" class="form-control" id="exampleInputEmail1" placeholder="Enter email" require>
                                </div>

                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="form-control" name="products_weight_unit" require>
                                        <option value=""> select plasea</option>
                                        @foreach($units as $unit)
                                        <option value=" {{$unit->units_name}}" <?php echo  $Product->products_weight_unit == $unit->units_name ? "selected" : "" ?>> {{$unit ->units_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> Attribute</label>
                                    <select class="form-control" name="attributes_id" require>
                                        <option value=""> select plasea</option>
                                        @foreach($attributes as $attribute)
                                        <option value=" {{$attribute ->name}}" <?php echo  $Product->attributes_id == $attribute->name ? "selected" : "" ?>> {{$attribute ->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Attributesvalue</label>
                                    <select class="form-control" name="attributes_set" require>
                                        <option value=""> select plasea</option>
                                        @foreach($attributesvalues as $attributesvalue)
                                        <option value=" {{$attributesvalue ->name}}" <?php echo  $Product->attributes_set == $attributesvalue->name ? "selected" : "" ?>> {{$attributesvalue ->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Description</label>
                                    <textarea name="is_current" class=" form-control" require minlength="25">{{$Product->is_current}}"</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Min Order</label>
                                    <input type="number" value="{{$Product->products_min_order}}" name="products_min_order" class="form-control" id="exampleInputEmail1" placeholder="Enter email" require>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Max Order</label>
                                    <input type="number" value="{{$Product->products_max_stock}}" name="products_max_stock" class="form-control" id="exampleInputEmail1" placeholder="Enter email" require>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="products_status" require>
                                        <option value=""> select plasea</option>

                                        <option value="0" <?php echo  $Product->products_status == "0" ? "selected" : "" ?>> Active</option>
                                        <option value="1" <?php echo  $Product->products_status == "1" ? "selected" : "" ?>> Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('admin.Product')}}" class="btn btn-danger float-right"> back</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
    </section>
</div>

@endsection