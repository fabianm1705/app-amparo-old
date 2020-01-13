@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <cart-component
                    :products="{{$shopping_cart->products}}"
                    :porccuotas="{{$porccuotas}}"
                    :porccredito="{{$porccredito}}">
        </cart-component>
      </div>
      <div class="col-12 col-md-4">
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
        <div>
          <form action="/procesar-pago" method="POST">
            <script
             src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
             data-preference-id="{{ $preference->id }}">
            </script>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
