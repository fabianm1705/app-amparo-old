@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm"><br>
          <header class="centrado">
            <h4>Cargar Nuevo Método de Pago</h4>
          </header>
          <div class="card-body">
            <form action="{{ route('payment_methods.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <div class="row d-flex justify-content-center">
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    </div>
                  </div>
                  <div class="col-sm-4 align-self-center">
                    <div class="form-check">
                      <input type="hidden" class="form-check-input" name="activo" value="0">
                      <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" {{ old('activo') ? 'checked="checked"' : '' }}>
                      <label class="form-check-label" for="activo">Activo</label>
                    </div>
                  </div>
                </div>
                <label for="icon">Seleccione una imagen</label>
                <input type="file" class="form-control" name="icon">
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
