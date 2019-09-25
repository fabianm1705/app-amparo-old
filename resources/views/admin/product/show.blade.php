@extends('layouts.appAdmin')

@section('content')
<div class="container">
  @if(Session::has('message'))
    <div class="container alert alert-success">
      {{ Session::get('message') }}
    </div>
  @endif

  <div class="row justify-content-center">
    <div class="col-md-6 seccion-contacto my-5">
      <div class="card shadow-sm"><br>
        <header class="centrado">
          <h4>Ver Celular</h4>
        </header>
        <div class="card-body">
          <div class="row justify-content-server">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="modelo" value="{{ $product->modelo }}">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $product->descripcion }}">
              </div>
              <div class="row d-flex">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="montoCuota">Monto Cuota</label>
                    <input type="text" class="form-control" name="montoCuota" id="montoCuota" value="{{ $product->montoCuota }}">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="cantidadCuotas">Cant. Cuotas</label>
                    <input type="text" class="form-control" name="cantidadCuotas" id="cantidadCuotas" value="{{ $product->cantidadCuotas }}">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-check">
                    <input type="hidden" class="form-check-input" name="vigente" value="0">
                    <input type="checkbox" class="form-check-input" id="vigente" name="vigente" value="1" {{ $product->vigente ? 'checked="checked"' : '' }}>
                    <label class="form-check-label" for="vigente">Activo</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
