@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm"><br>
        <header class="centrado">
          <h4>Socio</h4>
        </header>
        <div class="card-body">
          <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row justify-content-server">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="nroSocio">Nro. Socio</label>
                  <input type="text" class="form-control" name="nroSocio" id="nroSocio" value="{{ $user->group->nroSocio }}/{{ $user->nroAdh }}">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                  <label for="nroDoc">Documento</label>
                  <input type="text" class="form-control" name="nroDoc" id="nroDoc" value="{{ $user->nroDoc }}">
                  <label for="fechaNac">Fecha Nac.</label>
                  <input type="text" class="form-control" name="fechaNac" id="fechaNac" value="{{ $user->fechaNac }}">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                  <label for="direccion">Domicilio</label>
                  <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $user->group->direccion }}">
                  <hr>
                  <h5>Lista de Roles</h5>
                  <div class="form-group">
                    <ul class="list-unstyled">
                      @foreach($roles as $role)
                        <li>
                          <label>
                              <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                  @if($user->roles->contains($role->id))
                                    checked=checked
                                  @endif>
                            {{ $role->name }}
                            <em>{{ $role->description ?: 'N/A' }}</em>
                          </label>
                        </li>
                      @endforeach
                    </ul>
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
