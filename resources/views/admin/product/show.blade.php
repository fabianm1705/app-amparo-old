@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow-sm"><br>
        <div class="card-body">
          <div class="row">
            <div class="col-md-7 col-sm-12">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('images/imagen.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/imagen.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/imagen.jpg') }}" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Siguiente</span>
                </a>
              </div>            </div>
            <div class="col-md-5 col-sm-12">
              <header class="centrado">
                <h4>{{ $product->modelo }}<small> - by {{ $product->empresa }}</small></h4>
              </header>
              <div class="row justify-content-server">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="content">{{ $product->category->nombre }}</label>
                  </div>
                  <div class="form-group">
                    <label for="descripcion">{{ $product->descripcion }}</label>
                  </div>
                  <h5>Medios de Pago</h5>
                  <hr>
                  <div class="">
                    <div class="row align-items-center">
                      <div class="col-2">
                        <img class="w-100" src="{{ asset('images/favicon.png') }}" alt="">
                      </div>
                      <div class="col-10">
                        <h5>Cuotas de la Casa</h5>
                      </div>
                    </div>
                  </div>
                  <div class="justify-content-center">
                    <hr><img class="card-img-top w-50" src="{{ asset('images/mp.jpg') }}" alt="Todos los medios de pago">
                  </div>
                  <hr>
                  <div class="row d-flex">
                    <div class="col-3">
                      <add-to-cart-component :product="{{$product}}">
                      </add-to-cart-component>
                    </div>
                    <div class="col-9 blanco">
                      <add-and-buy-to-cart-component :product="{{$product}}">
                      </add-and-buy-to-cart-component>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
