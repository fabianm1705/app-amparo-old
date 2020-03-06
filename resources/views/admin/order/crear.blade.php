@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4 class="title text-center">
          Emisión de Órdenes
      </h4>
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
  @if($saludFlag)
    <div class="col-md-8 container alert alert-warning text-justify">
    <h5>Debes activar el Plan Salud para poder utilizar nuestra red de consultorios, puedes hacerlo ahora mismo y a un precio preferencial por ser socio, y comenzar a utilizarlo de inmediato!</h5>
    </div>
  @endif
  <div class="row justify-content-center">
    @if($saludFlag)
      <div class="col-md-4 card shadow-sm fresh-table full-color-orange ml-4 mr-4">
        <div class="title text-center text-white mb-4"><br>
          <h5 class="fontAmparo">Plan Salud</h5>
          <h1 class="card-title">
            @if($usersCount===1)
              <small class="text-white">$</small><strong>500</strong><small class="text-white"> /mes</small>
            @else
              <small class="text-white">$</small><strong>800</strong><small class="text-white"> Grupo Fliar</small>
            @endif
          </h1><br>
          Cobertura Ambulatoria Integral<hr>
          Consultorios Externos, Laboratorio<hr>
          Farmacia, Ambulancia, Emergencias<hr>
          Estudios, Radiografías, Ecografías y más.<br><br>
          @if($usersCount===1)
            <form action="{{ route('activar.salud') }}" method="post">
              @csrf
              <button class="btn btn-lg" type="submit" name="button">Activar</button>
            </form>
          @else
            <form action="{{ route('activar.plan') }}" method="post">
              @csrf
              <button class="btn btn-lg" type="submit" name="button">Activar</button>
            </form>
          @endif
        </div>
      </div>
    @endif
    @if($odontoFlag)
      <div class="col-md-4 card shadow-sm fresh-table full-color-orange ml-4 mr-4">
        <div class="title text-center text-white mb-4"><br>
          <h5 class="fontAmparo">Plan Odontológico</h5>
          <h1 class="card-title">
            <small class="text-white">$</small><strong>200</strong><small class="text-white"> /ind.</small>
          </h1><br>
          + $150 por Adherente<hr>
          Cobertura Odontológica Integral<hr>
          Odontólogos distribuidos por la ciudad<hr>
          Turnos rápidos, coseguros muy económicos<br><br>
          <form action="{{ route('activar.odontologia') }}" method="post">
            @csrf
            <button class="btn btn-lg" type="submit" name="button">Activar</button>
          </form>
        </div>
      </div>
    @endif
  </div>
</div>
@endsection
