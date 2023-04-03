@extends('email.layouts')
@section('title', '')
@section('content')
<h1>Reset password</h1>
<p>

    A password change has been requested for your account. If this was you, please use the link below to reset your password.</p>
<p style="text-align: center">
    <a href="{{ route('password.reset', ['token' => $token, 'email' => $user['email']]) }}" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">
        Reset Password
    </a>
</p>

@endsection