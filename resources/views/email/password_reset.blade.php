@extends('email.layouts')
@section('title', 'Password Reset')
@section('content')
    <p>you forgot your password for Cuba Admin. If this is true, click below to reset your password.</p>
    <p style="text-align: center">
        <a href="{{ route('password.reset', ['token' => $token, 'email' => $user['email']]) }}" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">
            Reset Password
        </a>
    </p>
    <p>If you have remember your password you can safely ignore his email.</p>
    <p>Good luck! Hope it works.</p>
@endsection
