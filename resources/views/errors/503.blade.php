@extends('errors::layouts')

@section('title', __('Service Unavailable'))

@section('content')
<div class="error-wrapper">
    <div class="container">
        <img class="img-100" src="{{ asset('admin/images/other-images/sad.png') }}" alt="logo">
        <div class="error-heading">
            <h2 class="headline font-secondary">
                503
            </h2>
        </div>
        <div class="col-md-8 offset-md-2">
            <p class="sub-content">
                {{ __('Service Unavailable') }}
            </p>
        </div>
        <div>
            <a class="btn btn-secondary-gradien btn-lg" href="{{ app('router')->has('home') ? route('home') : url('/') }}">
                BACK TO HOME PAGE
            </a>
        </div>
    </div>
</div>
@endsection
