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
      <div class="col-md-7 seccion-contacto my-5">
        <div class="card shadow-sm"><br>
          <header class="centrado">
            <h4>Crear Nuevo Menú</h4>
          </header>
          <div class="card-body">
            <form action="{{ route('menus.store') }}" method="post">
              @csrf
              <div class="row justify-content-server">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="nombre">Título</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="icono">Icono</label>
                    <input type="text" class="form-control" name="icono" id="icono" value="{{ old('icono') }}">
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
