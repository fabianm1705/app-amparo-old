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
              lugaremision="Sede Amparo"
              estado="Emitida"
              :emiteEnAdmin="true">
          </gen-orders-component>
      </form>
    </div>
  </div>
</div>
@endsection
