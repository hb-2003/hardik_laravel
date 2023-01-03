@extends('layouts.user.app')

@section('title', 'Change Password')

@section('css')
@endsection

@section('style')
@endsection

@section('content') 
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <h2>Change Password</h2>
            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Use the form below to change the password for your Vusey account</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.change_pass') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Old Password*</label>
                                    <div class="col-sm-9">
                                        <input type="password" placeholder="Old Password" class="form-control" id="horizontal-firstname-input" name="old_password" fplaceholder="Enter Old Password" required>
                                    </div>
                                </div><!-- end row -->
                                <div class="row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">New Password*</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="horizontal-email-input" name="password" placeholder="Enter New Password" require>
                                    </div>
                                </div><!-- end row -->
                                <div class="row mb-4">
                                    <label for="horizontal-password-input" class="col-sm-3 col-form-label">Confirmed New Password*</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="horizontal-password-input" name="password_confirmation" required type="Password" placeholder="Enter Confirmed New Password">
                                    </div>
                                </div><!-- end row -->

                                <div class="row justify-content-end">
                                    <div class="col-sm-9">

                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Update</button>
                                            <a href="{{route('user.account')}}" class="btn btn-danger"> Back</a>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </form><!-- end form -->
                        </div>
                    </div><!-- end card -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection