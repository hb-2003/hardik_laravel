@extends('layouts.auth')
@section('title', 'Confirm password')

@section('content')
<div class="row no-gutters justify-content-center my-4 py-4">
    <div class="col-lg-6 login-register-bg">
        <div class="lr-right">
            <div class="login-register-form">
                <form method="POST" action="{{ route('password.confirm') }}" style="text-align: left;" >
                    @csrf
                    <div class="rgstr-dt-txt">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>
                    <div class="form-group">
                        <input id="password" class="title-discussion-input" type="password" name="password" placeholder="Password" required autocomplete="current-password" >
                    </div>
                    <button class="login-btn" type="submit">
                        {{ __('Confirm') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
