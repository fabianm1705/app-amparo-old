@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11 seccion-contacto my-5">
      <div class="card shadow-sm">
        <div class="card-header bgOrange d-flex">
          <h5 class="card-title text-white">Celulares</h5>
          <div class="ml-auto">
            <a href="{{ route('products.create') }}" title="Nuevo">
              Agregar Nuevo
            </a>
           </div>
        </div>
        <div class="card-body centrado">
          <table class="table table-hover table-sm table-responsive">
            <thead>
              <th>Modelo</th>
              <th>Descripcion</th>
              <th class="text-center">Monto</th>
              <th class="text-center">Cant.</th>
              <th class="text-center">Activo</th>
              <th class="text-center">Acciones</th>
            </thead>
            <tbody>
              @foreach($products as $product)
                <tr>
                  <td>{{ $product->modelo }}</td>
                  <td class="text-justify">{{ $product->descripcion }}</td>
                  <td class="text-center">${{ $product->montoCuota }}</td>
                  <td class="text-center">{{ $product->cantidadCuotas }}</td>
                  <td class="text-center">
                    <input type="checkbox" class="form-check-input" id="vigente" name="vigente" disabled value="1" {{ $product->vigente ? 'checked="checked"' : '' }}>
                  </td>
                  <td class="text-right d-flex">
                    <a href="{{ route('products.show', ['product' => $product ]) }}" title="Ver" class="">
                      <div class="">
                        <i class="material-icons">search</i>
                      </div>
                    </a>&nbsp;
                    <a href="{{ route('products.edit', ['product' => $product ]) }}" title="Editar" class="">
                      <div class="">
                        <i class="material-icons">edit</i>
                      </div>
                    </a>&nbsp;
                    <form action="{{ route('products.destroy', ['product' => $product ]) }}" method="post" style="background-color: transparent;">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm" onclick="return confirm('Está seguro de eliminar el registro?')">
                        Borrar
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
