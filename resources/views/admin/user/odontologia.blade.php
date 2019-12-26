@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="card shadow-sm">
        <div class="card-header bgOrange d-flex">
          <h5 class="card-title text-white">Padrón Odontológico</h5>
          <div class="ml-auto">
            <form action="{{ route('users.search') }}" method="post">
                @csrf
                <input type="hidden" class="form-control" id="desdeDonde" name="desdeDonde" value="Usuarios">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control mb-1" id="name" name="name" placeholder="Nombre" autocomplete="off">
                  </div>
                  <div class="col-md-5">
                    <input type="text" class="form-control mb-2" id="nroDoc" name="nroDoc" placeholder="Documento" autocomplete="off">
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-success" type="submit">
                      <i class="material-icons">search</i>
                    </button>
                  </div>
                </div>
            </form>
          </div>
        </div>
        <div class="card-body centrado">
          <table class="table table-hover table-sm table-responsive">
            <thead>
              <th>Nro. Socio</th>
              <th>Nombre</th>
              <th>Documento</th>
              <th>Fecha Nac.</th>
              <th>Domicilio</th>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{ $user->group->nroSocio }}/{{ $user->nroAdh }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->nroDoc }}</td>
                  <td>{{ \Carbon\Carbon::parse($user->fechaNac)->format('d/m/Y') }}</td>
                  <td>{{ $user->group->direccion }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
