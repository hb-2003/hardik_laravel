<?php

use App\Models\Notification;

$notifications  = Notification::with('product')->where('read_at', 0)->get();

$notificationcount  = Notification::where('read_at', 0)->count();



?>


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('admin.home')}}" class="nav-link">Home</a>
    </li>

  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    @if($notificationcount == 0)
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge">{{$notificationcount}}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <h6  class="text-center p-3"> No order found!</h6>
        <div class="dropdown-divider"></div>

        <a href="{{route('admin.order')}}" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    @else
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge">{{$notificationcount}}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @foreach($notifications as $notification)
        <a href="{{route('admin.notificationorder',$notification->id)}}" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            @foreach($notification->productimage as $image)
            <img src="{{asset('images/product/'.$image->name) }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            @endforeach

            <div class="media-body">
              <h3 class="dropdown-item-title">
                {{$notification->product_name}}
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <!-- <p class="text-sm">Call me whenever you can...</p> -->
              <p class="text-sm text-muted"> {{$notification->price}} *{{$notification->quantity}} = {{$notification->price * $notification->quantity}}</p>
            </div>

          </div>
          <!-- Message End -->
        </a>
        @endforeach
        <div class="dropdown-divider"></div>

        <a href="{{route('admin.order')}}" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>



    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->
  </ul>
</nav>