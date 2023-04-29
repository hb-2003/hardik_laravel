@extends('user.dashboard.layouts')
@section('title', 'Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('dashboard')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title">Profile info</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.profile') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ ucfirst(Auth::user()->first_name) }}" id="formrow-email-input" placeholder="Enter E-mail">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ ucfirst(Auth::user()->last_name) }}" id="formrow-password-input" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="gender">gender</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="gender" value="male" id="formRadios1" <?php
                                                                                                                        use Illuminate\Support\Facades\auth;
                                                                                                                        echo Auth::user()->gender == 'male' ? " checked " : "" ?>>
                            <label class="form-check-label" for="formRadios1">
                                male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="female" id="formRadios2" <?php echo Auth::user()->gender == 'female' ? " checked " : "" ?>>
                            <label class="form-check-label" for="formRadios2">
                                female
                            </label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">DOB</label>
                            <input type="date" name="dob" value="{{ ucfirst(Auth::user()->dob) }}" class="form-control" id="formrow-password-input" placeholder="Enter DOB" max="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">telephone</label>
                            <input type="text" pattern="[7-9]{1}[0-9]{9}" name="telephone" value="{{ ucfirst(Auth::user()->telephone) }}" max="10" class="form-control" id="formrow-email-input" placeholder="Enter Telephone">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ ucfirst(Auth::user()->email) }}" id="formrow-password-input" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
                <div class="row -content-end">
                    <div class="col-sm-9">
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                            <a href="{{route('user.account')}}" class="btn btn-danger"> Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


        @endsection

        @section('js')
        @endsection