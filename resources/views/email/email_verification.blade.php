@extends('email.layouts')
@section('title', 'Verify Email')
@section('content')
    <p>Please click the button below to verify your email address.</p>
    <p style="text-align: center">
        <a href="{{ $url }}" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">
            Verify Email
        </a>
    </p>
    <p>If you did not create an account, no further action is required.</p>
    <p>Good luck! Hope it works.</p>
@endsection

