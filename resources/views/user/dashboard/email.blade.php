@extends('user.dashboard.layouts')
@section('title', 'Email Setting')

@section('css')
@endsection

@section('style')
@endsection

@section('dashboard')
<div class="setting-form">
    <div class="user-data full-width">
        <div class="about-left-heading">
            <h3>Email Setting</h3>
        </div>
        <div class="prsnl-info">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <form method="POST" action="{{ route('user.email') }}">
                        @csrf
                        <div class="form-group">
                            <label>Old Email Address*</label>
                            <input class="payment-input" name="old_email" required type="email" placeholder="Enter Old Email Address">
                        </div>
                        <div class="form-group">
                            <label>New Email Address*</label>
                            <input class="payment-input" name="email" required type="email" placeholder="Enter New Email Address">
                        </div>
                        <div class="add-profile-btn">
                            <button class="setting-save-btn" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection