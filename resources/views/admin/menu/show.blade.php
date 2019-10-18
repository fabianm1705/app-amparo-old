@extends('layouts.appAdmin')

@section('content')
<div class="container">
  @if(Session::has('message'))
    <div class="container alert alert-success">
      {{ Session::get('message') }}
    </div>
  @endif

  <div class="row justify-content-center">
    <div class="col-md-7 seccion-contacto my-5">
      <div class="card shadow-sm"><br>
        <header class="centrado">
          <h4>Ver Menú</h4>
        </header>
        <div class="card-body">
          <div class="row justify-content-server">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="nombre">Título</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $menu->nombre }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" name="url" id="url" value="{{ $menu->url }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="icono">Icono</label>
                <input type="text" class="form-control" name="icono" id="icono" value="{{ $menu->icono }}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
