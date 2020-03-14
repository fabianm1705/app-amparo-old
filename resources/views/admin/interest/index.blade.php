@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="fresh-table full-color-orange d-flex shadow-sm">
          <h5 class="card-title text-white mt-4 mb-4 ml-4">Zonas de Interés</h5>
          <div class="ml-auto blanco mr-2 mt-2">
            @can('interests.create')
            <a href="{{ route('interests.create') }}" title="Nueva">
              Agregar Nueva
            </a>
            @endcan
         </div>
     </div>
     <div class="card shadow-sm mt-1">
        <div class="card-body centrado">
          <table class="table table-hover table-sm table-responsive">
            <thead>
              <th>Descripción</th>
              <th>Activo</th>
              <th>Acciones</th>
            </thead>
            <tbody>
              @foreach($interests as $interest)
                <tr>
                  <td>{{ $interest->description }}</td>
                  <td class="text-center">
                    <input type="checkbox" class="form-check-input" id="activo" name="activo" disabled value="1" {{ $interest->activo ? 'checked="checked"' : '' }}>
                  </td>
                  <td class="text-right d-flex">
                    @can('interests.show')
                    <a href="{{ route('interests.show', ['interest' => $interest ]) }}" title="Ver" class="">
                      <div class="">
                        <i class="material-icons">search</i>
                      </div>
                    </a>&nbsp;
                    @endcan
                    @can('interests.edit')
                    <a href="{{ route('interests.edit', ['interest' => $interest ]) }}" title="Editar" class="">
                      <div class="">
                        <i class="material-icons">edit</i>
                      </div>
                    </a>&nbsp;
                    @endcan
                    @can('interests.destroy')
                    <form action="{{ route('interests.destroy', ['interest' => $interest ]) }}" method="post" style="background-color: transparent;">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm" onclick="return confirm('Está seguro de eliminar el registro?')">
                        Borrar
                      </button>
                    </form>
                    @endcan
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
