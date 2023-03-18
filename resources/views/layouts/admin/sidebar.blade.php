
<?php
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
$usercount =User::all()->count();
$productcount =Product::all()->count();
$paddingorders0 =  Order::with('order_product')->where('status', 0)->where('order_status', 0)->count();
$paddingorders1 =  Order::with('order_product')->where('status', 1)->where('order_status', 0)->count();
$paddingorders = $paddingorders0 + $paddingorders1;
$cansalorders =  Order::with('order_product')->where('status', 2)->where('order_status', 0)->count();
$ordercount = $paddingorders - $cansalorders;
?>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class=" img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.home')}}" class="d-block">admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('admin.home')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                          
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('admin.User')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        Users
                           
                            <span class="badge badge-info right"><?php  echo $usercount; ?></span>
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Catalog
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"><?php  echo $productcount; ?></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.Manufacturer')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manufacture</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.Categorie')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorie</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.Attribute')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attribute</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.Attributevlaue')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attribute Value </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.Unit')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>units</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.Product')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            order
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"><?php  echo $ordercount; ?></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.order')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>all order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.pending')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>pending order</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.cansal')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>cansal order</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{route('admin.return')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>return order </p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{route('admin.delivered')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>delivered order </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.return_pending')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>return pending </p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.slider')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Slider
                          
                        </p>
                    </a>

                </li>


                <li class="nav-item ">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>Logout</a>
                    </form>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>