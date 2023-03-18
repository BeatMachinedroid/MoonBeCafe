<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoonBeCafe | Dashboard</title>
    <link rel="shortcut icon" sizes="10x10" href="{{ asset('assets/images/logo.png') }}">
    <link href="{{ asset('assets/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/menubar/sidebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    {{-- nav --}}
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo">
                        <a href="{{ route('view.dashboard') }}">
                            <span>
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" />
                            </span>
                        </a>
                    </div>
                    {{-- <li class="label">Main</li> --}}
                    <li><a href="{{ route('view.dashboard') }}" class="sideba"><i class="ti-home"></i> Dashboard</a>
                    </li>
                    {{-- <li class="label">Apps</li> --}}
                    <li><a class="sidebar-sub-toggle"><i class="ti-archive"></i> Menu <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ route('view.add_menu') }}">Add Menu</a></li>
                            <li><a href="{{ route('view.menu') }}">All Menu</a></li>
                            <li><a href="{{ route('view.category') }}">Category</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('view.orders') }}"><i class="ti-view-list-alt"></i> History Orders </a></li>
                    <li><a href="{{ route('view.orders') }}"><i class="ti-user"></i> Costumers </a></li>
                    <li><a href="{{ route('view.orders') }}"><i class="ti-notepad"></i> Table </a></li>
                    <li><a href="{{ route('view.orders') }}"><i class="ti-rss"></i> Mitrans </a></li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Charts <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chartjs.html">Chartjs</a></li>
                            <li><a href="chartist.html">Chartist</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                            <li><a href="chart-sparkline.html">Sparkle</a></li>
                            <li><a href="chart-knob.html">Knob</a></li>
                        </ul>
                    </li>

                    <li><a href="../documentation/index.html"><i class="ti-file"></i> Documentation</a></li>
                    <li><a><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    {{-- end --}}

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. Soeng Souy</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">{{ Auth::user()->username }}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">{{ Auth::user()->role }}</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">

                            </div>
                        </div>
                    </div>
                    {{-- /# column --}}
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('view.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Category</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    {{-- column --}}
                </div>
                {{-- /# row --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{ route('post.category') }}" class="row"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nama Category" name="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="file" class="form-control" placeholder="Image"
                                                    name="image">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12" style="padding-bottom: 0; padding-top: 0;">
                                        <form action="" method="get" class="row">
                                            <div class="form-group col-sm-4">
                                                <input type="text" class="form-control" placeholder="Search">
                                            </div>
                                            <div class="col-sm-1">
                                                <button type="submit" class="btn btn-default"><i
                                                        class="ti-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        @if (session()->has('message'))
                                                            <div class="alert alert-success">
                                                                {{ session()->get('message') }}
                                                            </div>
                                                        @endif
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Category</th>
                                                            <th>File Name</th>
                                                            <th style="width: 200px">Image</th>
                                                            <th style="width: 200px; text-align: left">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($cate as $no => $item)
                                                            <tr>
                                                                <th scope="row">{{ $no + 1 }}</th>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->image }}</td>
                                                                <td><img src="{{ asset('storage/category/' . $item->image) }}"
                                                                        alt="{{ $item->nama }}"
                                                                        style="width: 120px; height: 120px;"></td>
                                                                <td style="text-align: left">
                                                                    {{-- <a href="{{ 'category/' . encrypt($item->id) . '/edit' }}"
                                                                        class="btn btn-primary btn-sm">
                                                                        <span
                                                                            class="glyphicon glyphicon-pencil"></span>
                                                                        Edit
                                                                    </a> --}}
                                                                    <a href="{{ 'category/' . encrypt($item->id) . '/delete' }}"
                                                                        class="btn btn-danger btn-sm">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                        Delete
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <div class="alert alert-primary" role="alert">
                                                                    Data is Empty
                                                                </div>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">

                                            {{ $cate->links('layout.vendor.pagination.costume') }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  jquery vendor  --}}
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    {{-- nano scroller  --}}
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    {{--  sidebar  --}}

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    {{--  bootstrap  --}}

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    {{-- scripit init --}}
    <script src="assets/js/dashboard2.js"></script>
</body>

</html>
