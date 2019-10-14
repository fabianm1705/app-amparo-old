@extends('layouts.app')

@section('content')
<div class="container seccion-contacto my-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4 ml-auto mr-auto">
            <h3 class="title text-center">
                Emisión de Órdenes
            </h3>
            <form action="{{ route('orders.store') }}" method="post">
                @csrf
                <specialty-doctors-select-component></specialty-doctors-select-component>
            </form><br>
        </div>
        <div class="col-md-7 ml-auto mr-auto">
          @include('ordersOld')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
