@extends('layouts.admin.app')

@section('title', 'content')

@section('css')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
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
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            <a class=" float-right btn btn-primary" href="{{ route('admin.Productadd') }}">add </a>
                        </div>



                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td>id</td>
                                            <th>Name</th>
                                            <th>image</th>
                                            <th>categorie</th>
                                            <th>status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Products as $key => $Product)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$Product ->products_name}}</td>

                                            <td>
                                               
                                                <img src="{{asset('images/product/'.$Product->productimage[0]->name)}}" width="100" height="100" alt="...">
                                             
                                            </td>
                                            <td>{{$Product -> products_type}}</td>
                                            <td> @if($Product ->products_status == 1 )
                                                <span class="right badge badge-danger"> Inactive </span>
                                                @else
                                                <span class="right badge badge-success">Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="{{ route('admin.Productedit',$Product->id) }}">edit</a></li>
                                                        <li><a class="dropdown-item" href="{{route('admin.Productdelete',$Product->id)}}">delete</a></li>

                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection