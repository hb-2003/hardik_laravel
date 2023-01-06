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
                    <h1>Attributevlaue add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Attributevlaue </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-rgb(52,58,64)">
                        <div class="card-header">
                            <h3 class="card-title">Attributevlaue add</h3>
                        </div>
                        <form accept="{{route('admin.Attributevlaueadd')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>manufacture</label>
                                    <select class="form-control" name="attribute_id">
                                        <option value=""> select plasea</option require>
                                        @foreach($attributes as $attribute)
                                        <option value="{{$attribute->id}}"> {{$attribute->name}}</option>
                                        @endforeachs
                                    </select>
                                </div>
                                @error('attribute_id')
                                <div class="alert alert-danger">The attribute is required.</div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter categorie  name" require>
                                </div>
                                @error('name')
                                <div class="alert alert-danger">The name is required.</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>status</label>
                                <select class="form-control" name="status" require>
                                    <option value=""> select plasea</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>

                            </div>
                            @error('status')
                                <div class="alert alert-danger">The Status Is Required.</div>
                                @enderror


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-danger float-right" href="{{route('admin.Attributevalue')}}"> back</a>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection