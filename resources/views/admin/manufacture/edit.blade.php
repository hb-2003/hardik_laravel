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
                    <h1>Edit Manufacturer</h1>
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
                            <h3 class="card-title">Edit Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form accept="{{route('admin.Manufactureredit',$manufacturer->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" name="manufacturer_name" value="{{$manufacturer->manufacturer_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                @error('manufacturer_name')
                                <div class="alert alert-danger">The Name  is required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="manufacturer_image" id="exampleInputFile" class="custom-file-input" value="{{$manufacturer->image}}">

                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>


                                    </div>
                                    <div>
                                        <img src="{{asset('images/manufacturer/'.$manufacturer->manufacturer_image)}}" width="10%" alt="...">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="status" required>
                                        <option value=""> select plasea</option>
                                        <option value="1" <?php  echo $manufacturer->status == 1 ? "selected" : "" ?>>Active</option>
                                        <option value="0" <?php  echo  $manufacturer->status == 0 ? "selected" : "" ?>>Inactive</option>
                                    </select>
                                    ($product['products_status']=="1"
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                @error('status')
                                <div class="alert alert-danger">The Status Is Required.</div>
                                @enderror

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger float-right" href="{{route('admin.Manufacturer')}}"> back</a>
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