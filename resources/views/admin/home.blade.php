@extends('layouts.admin.app')

@section('title', 'content')

@section('css')
@endsection

@section('style')
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalusers}}</h3>

                            <p>Total user</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalusers - $totalanverifyuser}} </h3>

                            <p> verify user</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalanverifyuser}}</h3>

                            <p>unverify user </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$last24users}}</h3>

                            <p>Last 24 user</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$lastweekusers}}</h3>

                            <p>last week user</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalproduct}}</h3>

                            <p>total product</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalOrder}}</h3>

                            <p>Total order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$total24Order}}</h3>

                            <p>last 24 order </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalweekOrder}}</h3>

                            <p>last week order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalmonthOrder}}</h3>

                            <p>last month order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$confirmorder}}</h3>

                            <p>Confirm order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalpenddingOrder}}</h3>

                            <p>pendding order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                




            </div>
            <div class="row">
            <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalorerOrder}}</h3>

                            <p>return order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totalcalsalorder}}</h3>

                            <p>cansal order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-" style="background-color: #343a40; color:white;">
                        <div class="inner">
                            <h3>{{$totaldelivaryorder}}</h3>

                            <p>Delivary order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recently Added Products</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @foreach($Products as $Product)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{asset('images/product/'.$Product->productimage[0]->name)}}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{$Product ->products_name }}
                                            <span class="badge badge-warning float-right">{{$Product ->products_price }}</span></a>
                                        <span class="product-description">
                                            {{$Product ->is_current }}
                                        </span>
                                    </div>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{route('admin.Product')}}" class="uppercase">View All Products</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recently get orders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>

                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @foreach($userorders as $userorder)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{asset('images/product/'.$Product->productimage[0]->name)}}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{$userorder ->customers_name }}{{$userorder ->customers_name }}
                                            <span class="badge badge-warning float-right">{{$userorder ->order_price }}</span></a>
                                        <span class="product-description">
                                            {{$Product ->pyment_type }}
                                        </span>
                                    </div>
                                </li>
                                @endforeach


                            </ul>
                        </div>

                        <div class="card-footer text-center">
                            <a href="{{route('admin.order')}}" class="uppercase">View All Products</a>
                        </div>

                    </div>
                </div>
            </div>
          
        </div>
    </section>
</div>

@endsection

@section('js')
<script src="{{asset('admin/dist/js/pages/dashboard2.js') }}"></script>
<script src="{{asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
@endsection