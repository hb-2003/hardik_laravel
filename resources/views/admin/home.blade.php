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
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                            <h3>{{$totalusers - $totalanverifyuser}}  </h3>

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

                            <p>Anverify user </p>
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
                            <h3>{{$totalpenddingOrder}}</h3>

                            <p>pendding order</p>
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
                            <h3>{{$totalorerOrder}}</h3>

                            <p>return order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>




        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection