
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
                    <h1>Categorie</h1>
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
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-rgb(52,58,64)">
                        <div class="card-header">
                            <h3 class="card-title"> Categorie edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form accept="{{route('admin.Attributevlaueedit',$attributesvalue->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                              

                                <div class="form-group">
                                    <label>manufacture</label>
                                    <select class="form-control" name="manufacturers_id">
                                        <option value=""> select plasea</option>
                                        @foreach($attributes as $attribute)
                                        <option value=" <?php echo $attribute->id ?> " <?php echo  $attribute->id == $attributesvalue->attribute_id ? "selected" : "" ?>> {{$attribute->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" name="name" value="{{$attributesvalue->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                

                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="status">
                                        <option value=""> select plasea</option>
                                        <option value="1" <?php 1 == $attributesvalue->status ? "selected" : "" ?>>Active</option>
                                        <option value="0" <?php 0 == $attributesvalue->status ? "selected" : "" ?>>Inactive</option>
                                    </select>

                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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


