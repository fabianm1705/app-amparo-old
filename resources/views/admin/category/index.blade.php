@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7 seccion-contacto my-5">
      <div class="card shadow-sm">
        <div class="card-header bgOrange d-flex">
          <h5 class="card-title text-white">Categorías</h5>
          <div class="ml-auto blanco">
            <a href="{{ route('categories.create') }}" title="Nueva">
              Agregar Nueva
            </a>
           </div>
        </div>
        <div class="card-body centrado">
          <table class="table table-hover table-sm table-responsive">
            <thead>
              <th>Descripción</th>
              <th>Activa</th>
              <th>Acciones</th>
            </thead>
            <tbody>
              @foreach($categories as $category)
                <tr>
                  <td>{{ $category->nombre }}</td>
                  <td class="text-center">
                    <input type="checkbox" class="form-check-input" id="activa" name="activa" disabled value="1" {{ $category->activa ? 'checked="checked"' : '' }}>
                  </td>
                  <td class="text-right d-flex">
                    <a href="{{ route('categories.show', ['category' => $category ]) }}" title="Ver" class="">
                      <div class="">
                        <i class="material-icons">search</i>
                      </div>
                    </a>&nbsp;
                    <a href="{{ route('categories.edit', ['category' => $category ]) }}" title="Editar" class="">
                      <div class="">
                        <i class="material-icons">edit</i>
                      </div>
                    </a>&nbsp;
                    <form action="{{ route('categories.destroy', ['category' => $category ]) }}" method="post" style="background-color: transparent;">
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
