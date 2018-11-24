<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Migsa') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet"/>
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <div class="sidebar" data-color="blue">
                <div class="logo">
                    <a href="{{ url('/home') }}" class="simple-text">
                        {{ config('app.name', 'SCM') }}
                    </a>
                </div>
                @include('layouts.menu')
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ url('/home') }}"><b>Migsa</b></a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            @if (Route::has('register'))
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                            @endif
                                        </li>
                                    @else
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            {{ Auth::user()->name }} <i class="fa fa-user"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">Salir</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    @endguest
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <center>
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ url('/home') }}" >
                                            Hecho por: Juan Camilo Lara y Camilo Forero
                                        </a>
                                        <center>
                                            &copy; 2018
                                        </center>
                                    </li>
                                </ul>
                            </nav>
                        </center>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/material.min.js') }}" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="{{ asset('assets/js/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="{{ asset('assets/js/material-dashboard.js') }}"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
</body>
</html>
