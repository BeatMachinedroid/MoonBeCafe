<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoonBeCafe | Dashboard</title>

    <link rel="shortcut icon" sizes="10x10" href="assets/images/logo.png">
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
                                <img src="assets/images/logo.png" alt=""/>
                            </span>
                        </a>
                    </div>
                    {{-- <li class="label">Main</li> --}}
                    <li><a href="{{ route('view.dashboard') }}" class="sideba"><i class="ti-home"></i> Dashboard</a></li>
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
                                  <div class="stat-text">Total: {{ $menu->groupBy('name')->count(); }}</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="card">
                            <div class="stat-widget-four">
                              <div class="stat-icon">
                                <i class="ti-user"></i>
                              </div>
                              <div class="stat-content">
                                <div class="text-left dib">
                                  <div class="stat-heading">Costumers</div>
                                  <div class="stat-text">Total: {{ $costumer->groupBy('email')->count() }}</div>
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
                                  <div class="stat-heading">Daily Incomes</div>
                                  <div class="stat-text">Total: Rp.765</div>
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
                                <div class="card-title">
                                    <h4>Fee Collections</h4>

                                </div>
                                <div class="card-body">
                                    <div class="ct-bar-chart m-t-30"></div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2023 © Admin Board. - <a href="https://moonbecafe.business.site/">moonbecafe.business.site</a></p>
                            </div>
                        </div>
                    </div>
                </section>
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
