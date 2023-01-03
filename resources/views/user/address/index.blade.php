@extends('user.dashboard.layouts')
@section('title', 'Email Setting')

@section('css')
@endsection

@section('style')
@endsection

@section('dashboard')


<div class="col-xl-12">
    <div class="card">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title">Striped Rows </h4>
            <a class="d-flex btn btn-primary" href="{{route('user.addressadd')}}">Add  New address</a>
        </div><!-- end card header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($address as $addres)
                        <tr>
                            <th scope="row">1</th>
                            <th>{{ $addres->first_name}}</th>
                            <th>{{ $addres->last_name}}</th>
                            <td>
                                <ul>
                                    <li>address :{{ $addres->address}}</li>
                                    <li>subrub :{{ $addres->suburb}}</li>
                                    <li>pincode :{{ $addres->postcode}}</li>
                                    <li>city :{{ $addres->city}}</li>
                                    <li>State :{{ $addres->state	}}</li>
                                    <li>Contery :{{ $addres->country}}</li>
                                </ul>
                            </td>

                            <td>
                                <div class="d-flex justify-content-end">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                             action
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{route('user.addressedit',$addres->id)}}">edit </a></li>
                                            <li><a class="dropdown-item" href="{{route('user.addressdelete',$addres->id)}}">delete</a>
                                            </li>
                                          
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody><!-- end table -->
                </table><!-- end table -->
            </div><!-- end table responsive -->
        </div><!-- end card body -->
    </div><!-- end card -->
    <a href="{{route('user.account')}}" class="btn btn-danger flax-end"> Back</a>
</div><!-- end col -->




@endsection

@section('js')
@endsection