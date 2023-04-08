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
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active"> Categorie</li>
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
                            <h3 class="card-title">Edit Detail</h3>
                        </div>
                        <form accept="{{route('admin.Categorieedit',$categorie->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Manufacture</label>
                                    <select class="form-control" name="manufacturers_id" >
                                        <option value=""> Select please</option>
                                        @foreach($Manufacturers as $Manufacturer)
                                        <option value=" <?php echo $Manufacturer->id ?> " <?php echo  $Manufacturer->id == $categorie->manufacturers_id ? "selected" : "" ?>> {{$Manufacturer->manufacturer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('manufacturers_id')
                                <div class="alert alert-danger">The Manufacturers is .</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="categorie_name" value="{{$categorie->categorie_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" >
                                </div>
                                @error('name')
                                <div class="alert alert-danger">The Name is .</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="categorie_image" id="exampleInputFile" class="custom-file-input" value="{{$categorie->categorie_image}}" >

                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img style="margin-top:1rem;" src="{{ asset('images/categorie/'.$categorie->categorie_image ) }}" width="7%" alt="...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" >
                                        <option value=""> select please</option>
                                        <option value="1" <?php echo  $categorie->status == "1" ? "selected" : "" ?>>Active</option>
                                        <option value="0" <?php echo  $categorie->status == "0" ? "selected" : "" ?>>Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="alert alert-danger">The Status Is Required.</div>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger float-right" href="{{route('admin.Categorie')}}"> Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
</div>

@endsection