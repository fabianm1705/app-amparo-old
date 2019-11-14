@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        @auth
          <div class="row justify-content-center">
            <div class="col-md-3 blanco">
              @can('orders.crear')
                  <button class="btn btn-success m-1 text-light w-100" type="" name="button">
                    <a class="" href="{{ route('orders.crear') }}">Emitir Orden</a>
                  </button>
              @endcan
            </div>
            <div class="col-md-3 blanco">
              @can('products.shopping')
                  <button class="btn btn-success m-1 text-light w-100" type="" name="button">
                    <a class="" href="{{ route('products.shopping') }}">Shopping</a>
                  </button>
              @endcan
            </div>
            <div class="col-md-3 blanco">
              @can('doctors.mostrar')
                  <button class="btn btn-success m-1 text-light w-100" type="" name="button">
                    <a class="" href="{{ route('doctors.mostrar') }}">Listado Médicos</a>
                  </button>
              @endcan
            </div>
            <div class="col-md-3 blanco">
              @can('contacto')
                  <button class="btn btn-success m-1 text-light w-100" type="" name="button">
                    <a class="" href="{{ route('contacto') }}">Contacto</a>
                  </button>
              @endcan
            </div>
          </div>
        @endauth
    </div>
  </div>
</div>
<div class="container"><br>
    <div class="text-center">
      Oficina Cura Alvarez 615, Paraná, Entre Ríos<br>
      Horario: Lunes a Viernes 8:30 a 18:00hs<br>
      Teléfonos Útiles<br>
      Sepelio: 4235108 / 154-057991<br>
      SOS Emergencias: 4222322 / 4233333<br>
      www.amparosrl.com.ar
    </div>
</div>


@endsection
