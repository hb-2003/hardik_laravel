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
            <h4 class="card-title">Profile info</h4>
        </div><!-- end card header -->
        <div class="card-body">
            <form method="POST" action="{{ route('user.addressedit' ,$address->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{$address->first_name }}" id="formrow-email-input" placeholder="Enter first n" require>
                        </div>
                        @error('first_name')
                        <div class="alert alert-danger">The First Name is required.</div>
                        @enderror
                    </div><!-- end col -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{$address->last_name }}" id="formrow-password-input" placeholder="Enter  last name" require>
                        </div>
                        @error('last_name')
                        <div class="alert alert-danger">The Last Name is required.</div>
                        @enderror
                    </div><!-- end col -->
                </div>


                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">address</label>
                            <textarea name="address" class="form-control" id="" cols="" rows="" placeholder="Enter addres " require>{{$address->address }}</textarea>

                        </div>
                        @error('address')
                        <div class="alert alert-danger">The address is required.</div>
                        @enderror

                    </div>

                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">suburb</label>
                            <input type="text" name="suburb" value="{{$address->suburb }}" class="form-control" id="formrow-password-input" placeholder="Enter Password" require>
                        </div>
                        @error('suburb')
                        <div class="alert alert-danger">The suburb is required.</div>
                        @enderror
                    </div><!-- end col -->
                    <!-- end col -->
                </div>
                <div class="row">


                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-postcode-input">postcode</label>
                            <input type="number" value="{{$address->postcode }}" name="postcode" class="form-control" id="formrow-postcode-input" placeholder="Enter Password" require>
                        </div>
                        @error('postcode')
                        <div class="alert alert-danger">The postcode is required.</div>
                        @enderror
                    </div><!-- end col -->
                    <!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">city</label>
                            <select class="form-select" name="city" require>
                                <option>Select</option>
                                @foreach($cities AS $citie )
                                <option value="{{ $citie -> name}}" <?php echo  ucwords($address->city) == $citie->name ? "selected" : "" ?>>{{$citie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('city')
                        <div class="alert alert-danger">The select city is required.</div>
                        @enderror
                    </div>

                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">type </label>

                            <select class="form-select" name="type" require>
                                <option>Select</option>
                                <option value="" <?php echo  $address->type == "home" ? "selected" : "" ?>>home</option>
                                <option value="work" <?php echo  $address->type == "work" ? "selected" : "" ?>>work</option>

                            </select>
                        </div>
                        @error('type')
                        <div class="alert alert-danger">The select type is required.</div>
                        @enderror
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