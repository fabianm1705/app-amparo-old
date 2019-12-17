<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Amparo Servicios Sociales
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="manifest" href="/manifest.json" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('material/material-kit.css?v=2.1.0') }}" rel="stylesheet" />
  <link href="{{ asset('css/app-amparo.css') }}" rel="stylesheet">
  <!-- jquery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  $('.container a').click(function(){

      var $target = $($(this).data('target'));

      if(!$target.hasClass('in'))

          $('.container .in').removeClass('in').height(0);

  });
    </script>
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ route('welcome') }}">
          <img src="{{ asset('images/logoSinSSSmall.png') }}" height="35">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <!-- navbar-nav ml-auto -->
              <li class="nav-item">
                  <a class="nav-link" href="#descarga" onclick="scrollToDownload()">
                      <i class="material-icons">person_add</i> Quiero Asociarme!
                  </a>
              </li>
              <li class="nav-item">
                @if (Route::has('login'))
                    @auth
                        <a class="nav-link" href="{{ url('/home') }}"><i class="material-icons">account_circle</i>&nbsp;Zona Socios</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}"><i class="material-icons">account_circle</i>&nbsp;Zona Socios</a>

                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                @endif
              </li>
          </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('images/30.jpg' )}})">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-md-6">
          <div class="blanco">
            <button type="submit" class="btn btn-warning btn-lg">
                @if (Route::has('login'))
                    @auth
                        <a class="" href="{{ url('/home') }}"><i class="material-icons">account_circle</i>&nbsp;Zona Socios</a>
                    @else
                        <a class="" href="{{ route('login') }}"><i class="material-icons">account_circle</i>&nbsp;Zona Socios</a>
                    @endauth
                @endif
            </button>
          </div>
          <h4>Somos una organización de Paraná de probada responsabilidad,
              que desde 2003 se preocupa y ocupa en brindar servicios
              en forma accesible y eficaz.</h4>
          <br>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
          <div class="features">
              <div class="row">
                  <div class="col-md-4">
                      <div class="info">
                          <div class="icon icon-info">
                              <i class="material-icons">control_point</i>
                          </div>
                          <h4 class="info-title">Odontología</h4>
                          <p>
                               Cobertura odontológica integral a muy bajo costo, con turnos inmediatos y excelentes profesionales,
                               además de la cobertura básica está incluído todo lo que es implantes, ortodoncias y prótesis.
                          </p>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="info">
                          <div class="icon icon-success">
                              <i class="material-icons">local_pharmacy</i>
                          </div>
                          <h4 class="info-title">Plan Salud</h4>
                          <p>
                              Este plan incluye todo lo que es consultorios externos, prácticas médicas, farmacia, ambulancia,
                              emergencias médicas, estudios de laboratorio, radiografías, ecografías, etc.
                          </p>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="info">
                          <div class="icon icon-danger">
                              <i class="material-icons">local_hospital</i>
                          </div>
                          <h4 class="info-title">Plan Joven</h4>
                          <p>
                            Se trata de un plan individual que integra la cobertura completa de Amparo, esto es los planes de
                            Salud, Odontología y Sepelio, y está destinado a jóvenes de hasta 35 años. ​
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="cd-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="title">Nos mantenemos en contacto</h2>
              <h5 class="description">Recibe toda la información que necesitas sin compromiso alguno,
              dejanos tus datos y un promotor se pondrá en contacto.</h5>
              <div class="info info-horizontal">
                <div class="icon icon-warning">
                  <i class="material-icons">pin_drop</i>
                </div>
                <div class="description">
                  <h4 class="info-title">Encuentranos en la oficina</h4>
                  <p> Cura Alvarez 615,
                    <br> 3100 Paraná,
                    <br> Entre Ríos, Argentina
                  </p>
                </div>
              </div>
              <div class="info info-horizontal">
                <div class="icon icon-warning">
                  <i class="material-icons">phone</i>
                </div>
                <div class="description">
                  <h4 class="info-title">Llamanos</h4>
                  <p> Leonela o Fabián
                    <br> Fijo: 4235108, Whatsapp: 155-508247,
                    <br> Lun - Vie, 8:30-18:00
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-5 ml-auto"><br><br>
              <div class="card card-contact">
                <form method="POST" action="{{ route('contactus.storewelcome') }}">
                  @csrf
                  <div class="card-header card-header-raised card-header-warning text-center">
                    <h4 class="card-title">Contacto</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group label-floating is-empty">
                      <label class="">Nombre</label>
                      <input type="text" name="name" id="name" class="form-control">
                      <span class="material-input"></span>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group label-floating is-empty">
                          <label class="">Domicilio</label>
                          <input type="text" name="address" id="address" class="form-control">
                          <span class="material-input"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group label-floating is-empty">
                          <label class="">Teléfono</label>
                          <input type="text" name="telephone" id="telephone" class="form-control">
                          <span class="material-input"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group label-floating is-empty">
                      <label class="bmd-label-floating">Email</label>
                      <input type="email" name="email" id="email" class="form-control">
                      <span class="material-input"></span>
                    </div>
                    <div class="form-group label-floating is-empty">
                      <label for="message" class="bmd-label-floating">Mensaje...</label>
                      <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                      <span class="material-input"></span>
                    </div>
                  </div>
                  <div class="card-footer right-content">
                    <button type="submit" class="btn btn-warning pull-right" id="form-submit" onclick="alert('Gracias por el mensaje! nos contactaremos a la brevedad.');">Enviar Mensaje</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
        <nav class="float-left">
            <ul>
                <li>
                    <a href="{{ route('about') }}">
                        Sobre Nosotros
                    </a>
                </li>
                <li>
                  <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/amparosrl" target="_blank" data-original-title="Danos un Me Gusta en Facebook">
                      <i class="fa fa-facebook-square"></i> Facebook
                  </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, <b>Amparo</b> Cura Alvarez 615 - Tel.:4235108
        </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{ asset('material/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('material/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('material/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('material/js/plugins/moment.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('material/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('material/js/plugins/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
  <script src="{{ asset('material/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('material/js/material-kit.js?v=2.1.0') }}" type="text/javascript"></script>
  <!-- <script src="main.js" type="text/javascript"></script> -->
  <script src="{{ asset('material/js/form_object.js') }}" type="text/javascript"></script>
  <script src="{{ asset('material/js/envioForm.js') }}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

    });


    function scrollToDownload() {
      if ($('.cd-section').length != 0) {
        $("html, body").animate({
          scrollTop: $('.cd-section').offset().top
        }, 1000);
      }
    }
  </script>
</body>
</html>
