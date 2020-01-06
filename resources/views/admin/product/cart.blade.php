@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <products-in-cart-component :products="{{$shopping_cart->products}}">
        </products-in-cart-component>
      </div>
      <div class="col-12 col-md-4">
        <p>Elige tu forma de pago:</p>
        <div>
          <img class="card-img-top" src="../images/cuotasdelacasa.png">
        </div>
        <div>
          <img class="card-img-top" src="../images/mp.jpg">
        </div>
        <div>
          <form action="/procesar-pago" method="POST">
            <script
             src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
             data-preference-id="1">
            </script>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
