@extends('layouts.admin.app')

@section('title', 'content')

@section('css')
@endsection

@section('style')
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Product</a></li>
                        <li class="breadcrumb-item active">Add</li>
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
                            <h3 class="card-title">Add Detai</h3>
                        </div>
                        <form accept="{{route('admin.Productadd')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Manufacturer</label>
                                    <select class="form-control" id="manufacturers_id" name="manufacturers_id" require>
                                        <option value=""> select plasea</option>
                                        @foreach($manufacturers as $manufacturer)
                                        <option value=" {{$manufacturer ->manufacturer_name}}"> {{$manufacturer ->manufacturer_name}}</option>

                                        @endforeach


                                    </select>
                                </div>
                                @error('manufacturers_id')
                                <div class="alert alert-danger">The Manufacturer Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label>Categorie</label>
                                    <select class="form-control" name="products_type" require>
                                        <option value=""> select plasea</option>
                                        @foreach($categories as $categorie)
                                        <option value=" {{$categorie ->categorie_name}}"> {{$categorie ->categorie_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                @error('products_type')
                                <div class="alert alert-danger">The Categorie Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="products_name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" require>
                                </div>
                                @error('products_name')
                                <div class="alert alert-danger">The Porduct Name Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" multiple="multiple" name="products_image[]" id="exampleInputFile" class=" form-control" require>
                                        </div>
                                    </div>
                                </div>
                                @error('products_image')
                                <div class="alert alert-danger">The Image Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">quantity</label>
                                    <input type="number" name="products_quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" require>
                                </div>
                                @error('products_quantity')
                                <div class="alert alert-danger">The quantity Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="number" name="products_price" class="form-control" id="exampleInputEmail1" placeholder="Enter price" require>
                                </div>
                                @error('products_price')
                                <div class="alert alert-danger">The Price Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Weight</label>
                                    <input type="number" name="products_weight" class="form-control" id="exampleInputEmail1" placeholder="Enter Wight" require>
                                </div>
                                @error('products_weight')
                                <div class="alert alert-danger">The Weight Is Required.</div>
                                @enderror
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="form-control" name="products_weight_unit" require>
                                        <option value=""> select plasea</option>
                                        @foreach($units as $unit)
                                        <option value=" {{$unit->units_name}}"> {{$unit ->units_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                @error('products_weight_unit')
                                <div class="alert alert-danger">The Units Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label> Attribute</label>
                                    <select class="form-control" name="attributes_id" require>
                                        <option value=""> select plasea</option>
                                        @foreach($attributes as $attribute)
                                        <option value=" {{$attribute ->name}}"> {{$attribute ->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                @error('attributes_id')
                                <div class="alert alert-danger">The Attribute Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label>Attributesvalue</label>
                                    <select class="form-control" name="attributes_set" require>
                                        <option value=""> select plasea</option>
                                        @foreach($attributesvalues as $attributesvalue)
                                        <option value=" {{$attributesvalue ->name}}"> {{$attributesvalue ->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                @error('attributes_set')
                                <div class="alert alert-danger">The Attribute Value Is Required.</div>
                                @enderror



                                <div class="form-group">
                                    <label for="exampleInputFile">description</label>
                                    <textarea name="is_current" id="" class=" form-control" require></textarea>
                                </div>
                                @error('is_current')
                                <div class="alert alert-danger">The Product Detail Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Min order</label>
                                    <input type="number" name="products_min_order" class="form-control" id="exampleInputEmail1" placeholder="Enter Min Order" require>
                                </div>
                                @error('products_min_order')
                                <div class="alert alert-danger">The Min order Is Required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Max Order</label>
                                    <input type="number" name="products_max_stock" class="form-control" id="exampleInputEmail1" placeholder="Enter Max order" require>
                                </div>
                                @error('products_max_stock')
                                <div class="alert alert-danger">The Max Stack Is Required.</div>
                                @enderror
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="products_status" require>
                                        <option value=""> select plasea</option>

                                        <option value="0"> Active</option>
                                        <option value="1"> Inactive</option>


                                    </select>
                                </div>
                            </div>
                            @error('status')
                            <div class="alert alert-danger">The Status Is Required.</div>
                            @enderror

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