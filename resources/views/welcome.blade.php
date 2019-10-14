<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Amparo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
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
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Zona Socios</a>
                    @else
                        <a href="{{ route('login') }}">@lang('messages.login')</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md fontAmparo">
                  <div class="d-flex justify-content-end">
                    <div class="mr-4"><br>
                      <img src="{{ asset("images/logo300x68.png") }}">
                    </div>
                  </div>
                </div>
                <div class="">
                  Oficina Cura Alvarez 615, Paraná, Entre Ríos<br>
                  Horario: Lunes a Viernes 8:30 a 18:00hs<br>
                  Teléfonos Útiles<br>
                  Sepelio: 4235108 / 154-057991<br>
                  SOS Emergencias: 4222322 / 4233333<br>
                  www.amparosrl.com.ar
                </div>
            </div>
        </div>
    </body>
</html>
