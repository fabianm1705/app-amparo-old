@extends('layouts.appAdmin')

@section('content')
  <div class="container">
    @if($errors->any())
      <div class="container alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-md-6 seccion-contacto my-5">
        <div class="card shadow-sm"><br>
          <header class="centrado">
            <h4>Cargar Nuevo Celular</h4>
          </header>
          <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row d-flex justify-content-center">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" name="modelo" id="modelo" value="{{ old('modelo') }}">
                  </div>
                </div>
                <div class="col-sm-4 align-self-center">
                  <div class="form-check">
                    <input type="hidden" class="form-check-input" name="vigente" value="0">
                    <input type="checkbox" class="form-check-input" id="vigente" name="vigente" value="1" {{ old('vigente') ? 'checked="checked"' : '' }}>
                    <label class="form-check-label" for="vigente">Activo</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="montoCuota">Monto Cuota</label>
                    <input type="text" class="form-control" name="montoCuota" id="montoCuota" value="{{ old('montoCuota') }}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="cantidadCuotas">Cantidad Cuotas</label>
                    <input type="text" class="form-control" name="cantidadCuotas" id="cantidadCuotas" value="{{ old('cantidadCuotas') }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="image_url">Seleccione una imagen</label>
                <input type="file" class="form-control" name="image_url">
              </div>
              <div class="text-right">
                <button class="btn btn-dark text-light" type="submit" name="button">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
