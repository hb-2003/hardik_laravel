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
                    <h1>Attributevlaue </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Attributevlaue</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-rgb(52,58,64)">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Detail</h3>
                        </div>
                        <form accept="{{route('admin.Attributevlaueedit',$attributesvalue->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Attribute</label>
                                    <select class="form-control" name="manufacturers_id" require>
                                        <option value=""> Select please</option>
                                        @foreach($attributes as $attribute)
                                        <option value=" <?php echo $attribute->id ?> " <?php echo  $attribute->id == $attributesvalue->attribute_id ? "selected" : "" ?>> {{$attribute->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('attribute_id')
                                <div class="alert alert-danger">The Attribute is required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="{{$attributesvalue->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" require>
                                </div>
                                @error('name')
                                <div class="alert alert-danger">The name is required.</div>
                                @enderror

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" require>
                                        <option value=""> Select please</option>
                                        <option value="1" <?php echo $attributesvalue->status == "1" ? "selected" : "" ?>>Active</option>
                                        <option value="0" <?php echo $attributesvalue->status == "0" ? "selected" : "" ?>>Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="alert alert-danger">The Status Is Required.</div>
                                @enderror

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-danger float-right" href="{{route('admin.Attributevlaue')}}"> Back</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection