@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9 alert alert-success">
          Gracias por tu compra! En breve nos pondremos en contacto para coordinar envío...
      </div>
    </div>
    <div class="row justify-content-center">
      @foreach($shopping_cart->products as $product)
        <div class="card card-product card-plain mr-2 mb-2 shadow-sm col-md-3 col-sm-11 col-xs-11">
          <div class="card-header-image">
            <img class="card-img-top w-100" src="{{ asset('images/'.$product->image_url) }}" alt="{{ $product->modelo }}">
          </div>
          <div class="card-body text-center">
            <div class="card-description" style="height: 70px;overflow:auto;">
              {{ $product->modelo }}<small> - {{ $product->descripcion }}</small>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="row justify-content-center">
      @foreach($payment_methods as $payment_method)
        <div class="card shadow-sm mr-2 mb-2 col-md-3 col-sm-11 col-xs-11">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-12" id="precio">
                <price-component
                        :productscost="{{ $productsCost }}"
                        :percentage="{{ $payment_method->percentage }}"
                        :cantcuotas="{{ $payment_method->cant_cuotas }}">
                </price-component>
              </div>
            </div>
            <div>
              <img class="w-100" src="{{ asset('images/'.$payment_method->image_url) }}" alt="{{ $payment_method->name }}">
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
