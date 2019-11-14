@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3 class="title text-center">
          Emisión de Órdenes
      </h3>
      <form action="{{ route('orders.store') }}" method="post">
          @csrf
          <gen-orders-component
              :users="{{$users}}"
              :specialties="{{$specialties}}"
              lugaremision="Autogestión Amparo"
              estado="Emitida"
              :emiteEnAdmin="false">
          </gen-orders-component>
      </form><br>
    </div>
  </div>
</div>
@endsection
