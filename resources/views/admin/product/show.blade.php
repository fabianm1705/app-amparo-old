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
                    <img src="{{ asset('images/'.$product->image_url) }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/'.$product->image_url2) }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/'.$product->image_url3) }}" class="d-block w-100" alt="...">
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
                  @foreach($payment_methods as $payment_method)
                    <center><div class="card shadow-sm mb-3 w-75">
                      <div class="card-body">
                        <div class="row justify-content-center">
                          <div class="col-10" id="precio">
                            <price-component
                                    :productscost="{{ $product->costo }}"
                                    :percentage="{{ $payment_method->percentage }}"
                                    :cantcuotas="{{ $payment_method->cant_cuotas }}">
                            </price-component>
                          </div>
                        </div>
                        <div>
                          <img class="w-100" src="{{ asset('images/'.$payment_method->image_url) }}" alt="{{ $payment_method->name }}">
                        </div>
                      </div>
                    </div></center>
                  @endforeach
                  <div class="row d-flex">
                    <div class="col-3">
                      <add-to-cart-component :product="{{$product}}">
                      </add-to-cart-component>
                    </div>
                    <div class="col-9 blanco">
                      <form action="{{ route('shopping_cart') }}" method="get" enctype="multipart/form-data">
                        @csrf
                        <add-and-buy-to-cart-component :product="{{$product}}">
                        </add-and-buy-to-cart-component>
                      </form>
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
