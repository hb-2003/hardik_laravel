@extends('layouts.user.app')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                @yield('dashboard')

            </div><!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    @endsection