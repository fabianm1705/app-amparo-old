<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="manifest" href="/manifest.json" />
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
<body style="background-image: url({{ asset('images/01.jpg' )}})">
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
                      @auth
                        @can('orders.indice')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('orders.indice') }}">Ordenes</a>
                          </li>
                        @endcan
                        @can('doctors.mostrar')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('doctors.mostrar') }}">Profesionales</a>
                          </li>
                        @endcan
                        @can('products.shopping')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('products.shopping') }}">Shopping</a>
                          </li>
                        @endcan
                        @can('otros')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('otros') }}">+Servicios</a>
                          </li>
                        @endcan
                        @can('contacto')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                          </li>
                        @endcan
                        @can('orders.index')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                          </li>
                        @endcan
                        @can('specialties.index')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('specialties.index') }}">Specialties</a>
                          </li>
                        @endcan
                        @can('doctors.index')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('doctors.index') }}">Doctors</a>
                          </li>
                        @endcan
                        @can('categories.index')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('categories.index') }}">Categoríes</a>
                          </li>
                        @endcan
                        @can('products.index')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                          </li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        @endcan
                        @can('users.index')
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                        </li>
                        @endcan
                        @can('instalar.app')
                        <li class="nav-item active">
                            <a href="#" onclick="addToHomeScreen()" class="nav-link">
                               <span class="uk-margin-small-right" data-uk-icon="icon: plus"></span>
                               Instalar
                            </a>
                        </li>
                        @endcan
                      @endauth
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
                                    {{ Str::before(Str::after(Auth::user()->name,' '),' ') }} <span class="caret"></span>
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
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                @if(Session::has('message'))
                  <div class="container alert alert-success">
                    {{ Session::get('message') }}
                  </div>
                @endif

                @if($errors->any())
                  <div class="container alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
              </div>
            </div>
          </div>

          @yield('content')
        </main>
    </div>
    @yield('myScripts')
</body>
</html>
