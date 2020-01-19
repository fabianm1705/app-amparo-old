@extends('layouts.app')

@section('content')
  <div class="container">
    <cart-component
          :products="{{$shopping_cart->products}}"
          :porccuotas="{{$porccuotas}}"
          :porccredito="{{$porccredito}}">
    </cart-component>
  </div>
@endsection
