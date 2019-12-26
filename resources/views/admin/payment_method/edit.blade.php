@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm"><br>
        <header class="centrado">
          <h4>Modificar Método de Pago</h4>
        </header>
        <div class="card-body">
          <form action="{{ route('payment_methods.update', ['payment_method' => $payment_method]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row justify-content-server">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $payment_method->name }}">
                </div>
                <div class="form-group">
                  <div class="col-lg-4">
                    <div class="form-check">
                      <input type="hidden" class="form-check-input" name="activo" value="0">
                      <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" {{ $payment_method->activo ? 'checked="checked"' : '' }}>
                      <label class="form-check-label" for="vigente">Activo</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 text-right">
                <button class="btn btn-dark text-light" type="submit" name="button">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
