@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <h4 class="title text-center mb-3">
                Búsqueda del Socio
            </h4>
            <form action="{{ route('users.search') }}" method="post">
                @csrf
                <input type="text" class="form-control mb-1" id="name" name="name" placeholder="Nombre" autocomplete="off">
                <input type="text" class="form-control mb-2" id="nroDoc" name="nroDoc" placeholder="Documento" autocomplete="off">
                <button class="btn btn-success btn-block" type="submit">
                  <i class="material-icons">search</i>
                </button>
            </form>
            <h4 class="title text-center mt-2">
                Resultados
            </h4>
            <table class="table table-hover table-sm table-responsive">
              <thead>
                <th>Nro Socio</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Domicilio</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->group->nroSocio }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nroDoc }}</td>
                    <td>{{ $user->group->direccion }}</td>
                    <td>
                      <a href="{{ route('orders.create', ['id' => $user->id ]) }}" title="Nueva Orden" class="">
                        <div class="">
                          <i class="material-icons">note_add</i>
                        </div>
                      </a>&nbsp;
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <orders-old-component :id="5"></orders-old-component>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
