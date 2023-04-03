@extends('layouts.frontend.app')
@section('title', 'content')

@section('css')
<!-- plugin css -->
<link href="{{asset('assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('style')
@endsection

@section('content')


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <h3>vuesy Help Center | 24x7 Customer Care Support</h3>
                <p>The vuesy Help Centre page lists out various types of issues that you may have encountered so that there can be quick resolution and you can go back to shopping online. For example, you can get more information regarding order tracking, delivery date changes, help with returns (and refunds), and much more. The vuesy Help Centre also lists out more information that you may need regarding vuesy Plus, payment, shopping, and more. The page has various filters listed out on the left-hand side so that you can get your queries solved quickly, efficiently, and without a hassle. You can get the vuesy Help Centre number or even access vuesy Help Centre support if you need professional help regarding various topics. The support executive will ensure speedy assistance so that your shopping experience is positive and enjoyable. You can even inform your loved ones of the support page so that they can properly get their grievances addressed as well. Once you have all your queries addressed, you can pull out your shopping list and shop for all your essentials in one place. You can shop during festive sales to get your hands on some unbelievable deals online. This information is updated on 07-Jan-23 </p>
                <div class="col-xl-12">
                    <div class="text-center">
                        <h3 class="text-primary">How Can We Help You?</h3>
                        <p class="lead">vuesy Help Center | 24x7 Customer Care Support</p>
                    </div>
                    <form method="POST" action="{{ route('user.contectus') }}" enctype="multipart/form-data">
                        @csrf
                        <div class=" d-flex align-items-center justify-content-center">
                            <div class="bg-white col-md-12">
                                <div class="p-4 rounded shadow-md">
                                    <div>
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="mt-3">
                                        <label for="email" class="form-label">Your Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Your Email">
                                    </div class="mt-3">
                                    <div class="mt-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" cols="20" rows="6" class="form-control" placeholder="message"></textarea>
                                    </div>
                                    <button class="btn btn-primary">
                                        Submit Form
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

@endsection

@section('js')3
<!-- google maps api -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

<!-- Gmaps file -->
<script src=" {{asset('assets/libs/gmaps/gmaps.min.js')}}"></script>

<!-- gmaps init -->
<script src=" {{asset('assets/js/pages/gmaps.init.js')}}"></script>

@endsection