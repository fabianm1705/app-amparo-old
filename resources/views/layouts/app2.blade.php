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
    <script src="{{ asset('js/addToHomeScreen.js') }}" defer></script>

    <link rel="manifest" href="/manifest.json" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-amparo.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
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

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
   <link href="{{ asset('css/fresh-bootstrap-table.css') }}" rel="stylesheet" />

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>

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
                      @auth
                        @can('orders.index')
                          <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Admin
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('orders.index') }}">Orders</a>
                              @can('doctors.index')
                                <a class="dropdown-item" href="{{ route('doctors.index') }}">Doctors</a>
                              @endcan
                              @can('categories.index')
                                <a class="dropdown-item" href="{{ route('categories.index') }}">Categoríes</a>
                              @endcan
                              @can('products.index')
                                <a class="dropdown-item" href="{{ route('products.index') }}">Products</a>
                              @endcan
                              @can('roles.index')
                                <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                              @endcan
                              @can('users.index')
                                <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                              @endcan
                              @can('payment_methods.index')
                                <a class="dropdown-item" href="{{ route('payment_methods.index') }}">Payment Methods</a>
                              @endcan
                              @can('shopping_cart.index')
                                <a class="dropdown-item" href="{{ route('shopping_cart.index') }}">Shopping Carts</a>
                              @endcan
                              @can('interests.index')
                                <a class="dropdown-item" href="{{ route('interests.index') }}">Zonas de Interés</a>
                              @endcan
                              @can('interests.index')
                                <a class="dropdown-item" href="{{ route('interests.visor') }}">Visor: Zonas de Interés</a>
                              @endcan
                              @can('subscriptions.index')
                                <a class="dropdown-item" href="{{ route('subscriptions.index') }}">Plans/Subscriptions</a>
                              @endcan
                            </div>
                          </div>
                        @endcan
                      @endauth
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
                        @can('carrito')
                          <li class="nav-item active blanco">
                            <a class="nav-link"
                              href="{{ route('shopping_cart.cart') }}"
                              title="Carrito de Compras">
                              <cart-counter-component :count="{{ $productsCount }}"></cart-counter-component>
                            </a>
                          </li>
                        @endcan
                        @can('otros')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('otros') }}">+Servicios</a>
                          </li>
                        @endcan
                        @can('aop')
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('odontologia') }}">Odontológico</a>
                        </li>
                        @endcan
                        @can('sos.emergencias')
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('emergencia') }}">Padrón</a>
                        </li>
                        @endcan
                        @can('contacto')
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                          </li>
                        @endcan
                        {{-- @can('instalar.app')
                        <li class="nav-item active">
                            <a href="#" onclick="addToHomeScreen()" class="nav-link">
                               <span class="uk-margin-small-right" data-uk-icon="icon: plus"></span>
                               Instalar
                            </a>
                        </li>
                        @endcan --}}
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
                  <div class="container alert alert-success animated fadeOut delay-3s">
                    {{ Session::get('message') }}
                  </div>
                @endif

                @if($errors->any())
                  <div class="container alert alert-danger animated fadeOut delay-3s">
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

<script type="text/javascript">
  var $table = $('#fresh-table')
  var $alertBtn = $('#alertBtn')

  window.operateEvents = {
    'click .like': function (e, value, row, index) {
      alert('You click like icon, row: ' + JSON.stringify(row))
      console.log(value, row, index)
    },
    'click .edit': function (e, value, row, index) {
      alert('You click edit icon, row: ' + JSON.stringify(row))
      console.log(value, row, index)
    },
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      })
    }
  }

  function operateFormatter(value, row, index) {
    return [
      '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
        '<i class="fa fa-heart"></i>',
      '</a>',
      '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
        '<i class="fa fa-edit"></i>',
      '</a>',
      '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
        '<i class="fa fa-remove"></i>',
      '</a>'
    ].join('')
  }

  $(function () {
    $table.bootstrapTable({
      classes: 'table table-hover table-striped',
      toolbar: '.toolbar',

      search: true,
      showRefresh: true,
      showToggle: true,
      showColumns: true,
      pagination: true,
      striped: true,
      sortable: true,
      pageSize: 8,
      pageList: [8, 10, 25, 50, 100],

      formatShowingRows: function (pageFrom, pageTo, totalRows) {
        return ''
      },
      formatRecordsPerPage: function (pageNumber) {
        return pageNumber + ' rows visible'
      }
    })

    $alertBtn.click(function () {
      alert('You pressed on Alert')
    })
  })

  $('#sharrreTitle').sharrre({
    share: {
      twitter: true,
      facebook: true
    },
    template: '',
    enableHover: false,
    enableTracking: true,
    render: function (api, options) {
      $("#sharrreTitle").html('Thank you for ' + options.total + ' shares!')
    },
    enableTracking: true,
    url: location.href
  })

  $('#twitter').sharrre({
    share: {
      twitter: true
    },
    enableHover: false,
    enableTracking: true,
    buttons: { twitter: {via: 'CreativeTim'}},
    click: function (api, options) {
      api.simulateClick()
      api.openPopup('twitter')
    },
    template: '<i class="fa fa-twitter"></i> {total}',
    url: location.href
  })

  $('#facebook').sharrre({
    share: {
      facebook: true
    },
    enableHover: false,
    enableTracking: true,
    click: function (api, options) {
      api.simulateClick()
      api.openPopup('facebook')
    },
    template: '<i class="fa fa-facebook-square"></i> {total}',
    url: location.href
  })
</script>

</html>
