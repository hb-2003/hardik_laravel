@extends('layouts.user.app')
@section('title', 'content')

@section('css')

@endsection

@section('style')
@endsection

@section('content')
<div class="main-content">
    <div class="page-content">

    <div class="row justify-content-center pt-5 g-0 align-items-center w-100 ">
                                <div class="col-xl-4 col-lg-8" >
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="px-3 py-3">
                                                <div class="avatar-lg mx-auto">
                                                    <div class="avatar-title bg-soft-primary text-primary display-5 rounded-circle">
                                                    <iconify-icon icon="mdi:success-circle-outline"></iconify-icon>
                                                    </div>
                                                </div>
                                                <div class="text-center mt-4 pt-2">
                                                    <h4>Thank You For Order</h4>
                                                    <p>Thank you for using <span class="fw-semibold">Vuesy FurNiture</span></p>
                                                    <div class="mt-4">
                                                        <a href="{{route('user.dashboard')}}" class="btn btn-primary w-100">Back to Home</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

@endsection