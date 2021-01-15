<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.dataTables.min.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/buttons.dataTables.min.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('/js/jszip.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('/js/buttons.html5.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-select.min.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
    <style>
        body {
            background-image: url('/images/bg.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{ config('app.name', 'Laravel') }}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="/datashift">Data Shift</a>
                        <a class="nav-item nav-link active" href="/jadwal">Jadwal Menu</a>
                        @can('isAdmin')
                        <div class="dropdown show">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admin Setting
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/karyawan">Karyawan</a>
                                <a class="dropdown-item" href="/makanan">Makanan</a>
                                <a class="dropdown-item" href="/data">Data</a>
                                <a class="dropdown-item" href="/user">Daftar Pengguna</a>
                                <a class="dropdown-item" href="/departement">Departement</a>
                            </div>
                        </div>
                        <div class="dropdown show">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Data Upload
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/upload/karywawan">Karyawan</a>
                                <a class="dropdown-item" href="/upload/makanan">Makanan</a>
                                <a class="dropdown-item" href="/upload/menu">Jadwal Menu</a>
                                <a class="dropdown-item" href="/upload/data">Data Shift</a>
                            </div>
                        </div>
                        @endcan
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                    <a class="dropdown-item" href="/">Monitor 1</a>
                                    <a class="dropdown-item" href="/monitor2">Monitor 2</a>
                                    <a class="dropdown-item" href="/monitor3">Monitor 3</a>
                                    <a class="dropdown-item" href="/changepassword">Rubah Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row h-100">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                order: [[0, 'desc']],
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                info: false,
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                ]
            });
        });
    </script>
</body>
</html>