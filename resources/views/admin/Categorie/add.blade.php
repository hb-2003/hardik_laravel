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
                        <li class="breadcrumb-item active">Categorie</li>
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-rgb(52,58,64)">
                        <div class="card-header">
                            <h3 class="card-title">Add Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form accept="{{route('admin.Manufactureradd')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>manufacture</label>
                                    <select class="form-control" name="manufacturers_id" required>
                                        <option value=""> select plasea</option>

                                        @foreach($manufacturers as $manufacturer)
                                        <option value="{{$manufacturer->id}}"> {{$manufacturer->manufacturer_name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> CategorieName</label>
                                    <input type="text" name="categorie_name" class="form-control" id="name" placeholder="Enter categorie name" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="categorie_image" id="exampleInputFile" class=" form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control" name="status" required>
                                        <option value=""> select plasea</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>

                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a  class="btn btn-danger float-right" href="{{route('admin.Categorie')}}"> back</a>
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