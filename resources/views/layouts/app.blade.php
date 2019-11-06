<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-amparo.css') }}" rel="stylesheet">
    <style media="screen">
        @font-face {
            font-family: 'iProton';
            src:
            url('{{ asset("css/iProton-Bold.otf") }}') format('opentype'),
            url('{{ asset("css/iProton-Bold.ttf") }}') format('truetype');
        }
        .fontAmparo {
            font-family: 'iProton';
        }
   </style>
   @yield('myLinks')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand fontAmparo" href="{{ url('/home') }}">
                  <div class="d-flex justify-content-end">
                    <div class="mr-2">
                      <img src="{{ asset('images/logoSinSSSmall.png') }}" height="35">
                    </div>
                  </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('getOrders') }}">Ordenes</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('profesionales') }}">Profesionales</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('Shopping') }}">Shopping</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('otros') }}">+Servicios</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">@lang('messages.login')</a>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <div class="">
                                          @lang('messages.logout')
                                        </div>
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

        <main class="py-4"><br><br>
            @yield('content')
        </main>
    </div>
    @yield('myScripts')
</body>
</html>
