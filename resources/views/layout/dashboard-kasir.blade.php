@extends('layout.main.main2')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome {{ Auth::user()->username }}</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-four">
                                    <div class="stat-icon">
                                        <i class="ti-server"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Menu</div>
                                            <div class="stat-text">Total: {{ $menu->groupBy('name')->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-four">
                                    <div class="stat-icon">
                                        <i class="ti-layout-cta-center"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Meja</div>
                                            <div class="stat-text">Total: {{ $meja->groupBy('name')->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-four">
                                    <div class="stat-icon">
                                        <i class="ti-stats-up"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Total Incomes</div>
                                            <div class="stat-text">Rp. {{ $hasil }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-four">
                                    <div class="stat-icon">
                                        <i class="ti-shopping-cart-full"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Orders</div>
                                            <div class="stat-text">Total: {{ $order->groupBy('id')->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Incomes chart</h4>
                                    <ul class="list-inline text-right">
                                        {{-- <li>
                                            <h5><i class="fa fa-circle m-r-5 text-inverse"></i>iPhone</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5 text-info"></i>iPad</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5 text-success"></i>iPod</h5>
                                        </li> --}}
                                    </ul>
                                    <div id="morris-area-chart"></div>
                                </div>
                            </div>
                        </div>
                    @endsection
