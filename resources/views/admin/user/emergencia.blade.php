@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bgOrange d-flex">
          <h5 class="card-title text-white">Padrón SOS Emergencias - {{ $usersCount }} cápitas</h5>
        </div>
        <div class="card-body centrado">
          <table class="table table-hover table-sm table-responsive">
            <thead>
              <th>Nro. Socio</th>
              <th>Nombre</th>
              <th>Documento</th>
              <th>Fecha Nac.</th>
            </thead>
            <tbody>
              @foreach($groups as $group)
                @foreach($group->users as $user)
                  <tr>
                    <td>{{ $user->group->nroSocio }}/{{ $user->nroAdh }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nroDoc }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->fechaNac)->format('d/m/Y') }}</td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
