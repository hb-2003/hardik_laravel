@extends('user.dashboard.layouts')
@section('title', 'Email Setting')

@section('css')
@endsection

@section('style')
@endsection

@section('dashboard')


<div class="col-xl-9">
    <div class="card">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title">Profile info</h4>
        </div><!-- end card header -->
        <div class="card-body">
            <form method="POST" action="{{ route('user.addressadd') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="" id="formrow-email-input" placeholder="Enter E-mail" require>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="" id="formrow-password-input" placeholder="Enter  last name" require>
                        </div>
                    </div><!-- end col -->
                </div><!-- e<!-- end row -->


                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">address</label>
                            <textarea name="address" class="form-control" id="" cols="" rows="" placeholder="Enter addres " require></textarea>

                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-suburb-input">suburb</label>
                            <input type="text" name="suburb" class="form-control" id="formrow-suburb-input" placeholder="Enter suburb" require>
                        </div>
                    </div><!-- end col -->
                    <!-- end col -->
              

                </div>
                <div class="row">
                   

                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-postcode-input">postcode</label>
                            <input type="number" name="postcode" class="form-control" id="formrow-postcode-input" placeholder="Enter Password" require>
                        </div>
                    </div><!-- end col -->
                    <!-- end col -->
              

                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">city</label>
                            <input type="text" name="city" class="form-control" id="formrow-city-input" placeholder="Enter city" require>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">State </label>

                            <select class="form-select" name="state" require>
                                <option>Select</option>
                                <option value="gujrat">gujrat</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- end col -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">Countery</label>

                            <select class="form-select" name="country" require>
                                <option>Select</option>

                                <option value="gujrat">gujrat</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">type </label>

                            <select class="form-select" name="type" require>
                                <option>Select</option>
                                <option value="home">home</option>
                                <option value="work">work</option>

                            </select>
                        </div>
                    </div><!-- end col -->
                </div>


                <div class="row -content-end">
                    <div class="col-sm-9">
                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="horizontal-customCheck">
                            <label class="form-check-label" for="horizontal-customCheck">Remember me</label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </form><!-- end form -->
        </div>
    </div><!-- end card -->
</div>


@endsection

@section('js')


@endsection