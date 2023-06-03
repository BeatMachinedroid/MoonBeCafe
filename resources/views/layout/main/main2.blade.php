<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoonBeCafe | Dashboard</title>
    <meta http-equiv="refresh" content="10000">
    <link rel="shortcut icon" sizes="10x10" href="{{ asset('assets/images/logo.png') }}">
    <link href="{{ asset('assets/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/js/lib/chartist/chartist.min.js') }}"></script>

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
                            <img src="{{ asset('assets/images/logo.png') }}" alt=""/>
                        </span>
                    </a>
                </div>
                {{-- <li class="label">Main</li> --}}
                <li><a href="{{ route('view.dashboard') }}" class="sidebar"><i class="ti-home"></i> Dashboard</a></li>
                {{-- <li class="label">Apps</li> --}}
                <li><a class="sidebar-sub-toggle"><i class="ti-archive"></i> Menu <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ route('view.menu') }}">Menu</a></li>
                        <li><a href="{{ route('view.category') }}">Category</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('view.meja') }}"><i class="ti-notepad"></i> Table </a></li>
                <li><a href="{{ route('view.order') }}"><i class="ti-view-list-alt"></i> Orders </a></li>
                <li><a href=""><i class="ti-user"></i> Acount </a></li>

                {{-- <li><a href=""><i class="ti-user"></i> Costumers </a></li> --}}
                {{-- <li><a href=""><i class="ti-rss"></i> Pemesanan </a></li>
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
                </li> --}}

                {{-- <li><a href="../documentation/index.html"><i class="ti-file"></i> Documentation</a></li> --}}
                <li><a href="{{ route('logout') }}"><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
{{-- end --}}

<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div> --}}

                <div class="float-right">
                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="user-avatar">{{ Auth::user()->username }} - {{ Auth::user()->role }}
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(119px, 51px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">{{ Auth::user()->email }}</span>
                                    <p class="trial-day">{{ Auth::user()->role }}</p>
                                </div>
                                {{-- <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{ route('logout') }}">
                                                <i class="ti-power-off"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    @yield('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="footer">
                <p>2023 © Admin Board. - <a href="https://moonbecafe.business.site/">moonbecafe.business.site</a></p>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</body>
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
 {{-- nano scroller  --}}
<script src="{{ asset('assets/js/lib/menubar/sidebar.js') }}"></script>
<script src="{{ asset('assets/js/lib/preloader/pace.min.js') }}"></script>
{{--  sidebar  --}}

<script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
{{--  bootstrap  --}}

<script src="{{ asset('assets/js/lib/calendar-2/moment.latest.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/calendar-2/pignose.init.js') }}"></script>


<script src="{{ asset('assets/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/weather/weather-init.js') }}"></script>
<script src="{{ asset('assets/js/lib/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/circle-progress/circle-progress-init.js') }}"></script>
<script src="{{ asset('assets/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/sparklinechart/sparkline.init.js') }}"></script>
<script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>

<script src="{{ asset('assets/js/lib/morris-chart/raphael-min.js')}}"></script>
<script src="{{ asset('assets/js/lib/morris-chart/morris.js')}}"></script>
{{-- <script src="{{ asset('assets/js/lib/morris-chart/morris-init.js')}}"></script> --}}
 {{-- scripit init --}}
{{-- <script src="{{ asset('assets/js/dashboard2.js') }}"></script> --}}
<script>
    Morris.Area( {
		element: 'morris-area-chart',
		data: [

            @forelse ($orders as $order)
            {
				period: '{{ $order->year }}',
				orders : {{ $order->total_orders }},
                pemasukan : {{ $order->pemasukan}},
            },
            @empty
                {
                    period : 'data is empty',
                    orders : 0,
                    pemasukan : 0,
                }
            @endforelse
        ],

		lineColors: [  '#DC3545','#28A745', '#007BFF' ],
		xkey: 'period',
		ykeys: [ 'orders' , 'pemasukan'],
		labels: [ 'Order' ,'pemasukan'],
		pointSize: 0,
		lineWidth: 0,
		resize: true,
		fillOpacity: 0.8,
		behaveLikeLine: true,
		gridLineColor: '#e0e0e0',
		hideHover: 'auto'

	} );
</script>

</html>
