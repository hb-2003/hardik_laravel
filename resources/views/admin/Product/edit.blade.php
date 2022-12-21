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
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-rgb(52,58,64)">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form accept="{{route('admin.Productedit',$Product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" id="manufacturers_id" name="manufacturers_id">
                                        <option value=""> select plasea</option>
                                        @foreach($manufacturers as $manufacturer)
                                        <option value=" {{$manufacturer ->manufacturer_name}}" <?php echo  $Product->manufacturers_id == $manufacturer->manufacturer_name ? "selected" : "" ?>> {{$manufacturer ->manufacturer_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                          
                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="products_type">
                                        <option value=""> select plasea</option>
                                        @foreach($categories as $categorie)
                                        <option value=" {{$categorie ->categorie_name}}" <?php echo  $Product->products_type == $categorie->categorie_name ? "selected" : "" ?>> {{$categorie ->categorie_name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" name="products_name" value="{{$Product->products_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" value="" multiple="multiple"name="products_image[]" id="exampleInputFile" class=" form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">quantity</label>
                                    <input type="number" value="{{$Product->products_quantity}}" name="products_quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">price</label>
                                    <input type="number" value="{{$Product->products_price}}" name="products_price" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">weight</label>
                                    <input type="number" value="{{$Product->products_weight}}" name="products_weight" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <select class="form-control" name="attributes_id">
                                        <option value=""> select plasea</option>
                                        @foreach($attributes as $attribute)
                                        <option value=" {{$attribute ->name}}" <?php echo  $Product->attributes_id == $attribute->name ? "selected" : "" ?>> {{$attribute ->name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Attributesvalue</label>
                                    <select class="form-control" name="attributes_set">
                                        <option value=""> select plasea</option>
                                        @foreach($attributesvalues as $attributesvalue)
                                        <option value=" {{$attributesvalue ->name}}" <?php echo  $Product->attributes_set == $attributesvalue->name ? "selected" : "" ?>> {{$attributesvalue ->name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="products_weight_unit">
                                        <option value=""> select plasea</option>
                                        @foreach($units as $unit)
                                        <option value=" {{$unit->units_name}}" <?php echo  $Product->products_weight_unit == $unit->units_name ? "selected" : "" ?>> {{$unit ->units_name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">description</label>


                                    <textarea name="is_current"  class=" form-control">{{$Product->is_current}}"</textarea>


                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">min order</label>
                                    <input type="number" value="{{$Product->products_min_order}}" name="products_min_order" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">max order</label>
                                    <input type="number" value="{{$Product->products_max_stock}}" name="products_max_stock" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="products_status">
                                        <option value=""> select plasea</option>
                                        
                                        <option value="0" <?php echo  $Product->products_status ==0 ? "selected" : "" ?>> Active</option>
                                        <option value="1" <?php echo  $Product->products_status == 1 ? "selected" : "" ?>> Inactive</option>

                                       
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection