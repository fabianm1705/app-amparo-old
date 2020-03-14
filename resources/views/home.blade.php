@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        @auth
          <div class="row justify-content-center">
            @can('orders.crear')
              <div class="col-md-3 blanco">
                <button class="btn btn-success m-1 text-light w-100" type="" name="button">
                  @foreach (Auth::user()->roles as $role)
                    @if(($role->slug=='dev') or ($role->slug=='admin'))
                      <a class="" href="{{ route('usersSearch') }}">Emitir Orden</a>
                    @else
                      <a class="" href="{{ route('orders.crear') }}">Emitir Orden</a>
                    @endif
                  @endforeach
                </button>
              </div>
            @endcan
            @can('doctors.mostrar')
              <div class="col-md-3 blanco">
                <button class="btn btn-success m-1 text-light w-100" type="" name="button">
                  <a class="" href="{{ route('doctors.mostrar') }}">Listado Médicos</a>
                </button>
              </div>
            @endcan
            @can('products.shopping')
              <div class="col-md-3 blanco">
                <button class="btn btn-success m-1 text-light w-100" type="" name="button">
                  <a class="" href="{{ route('products.shopping') }}">Shopping</a>
                </button>
              </div>
            @endcan
            @if(Auth::user()->password_changed_at)
              @can('contacto')
                <div class="col-md-3 blanco">
                  <button class="btn btn-success m-1 text-light w-100" type="" name="button">
                    <a class="" href="{{ route('contacto') }}">Contacto</a>
                  </button>
                </div>
              @endcan
            @else
              <div class="col-md-3 blanco">
                <button class="btn btn-danger m-1 text-light w-100" type="" name="button">
                  <a class="" href="{{ route('password.edit') }}">Modif Contraseña</a>
                </button>
              </div>
            @endif
          </div>

          @if(Auth::user()->password_changed_at==null)
            <div class="container alert alert-danger"><br>
              <ul>
                <li>Por seguridad modifique una vez su contraseña de acceso</li>
              </ul>
            </div>
          @endif

        @endauth
    </div>
  </div>
</div>
<div class="container mt-2">
    <div class="text-center">
      Oficina Cura Alvarez 615, Paraná, Entre Ríos<br>
      Horario: Lunes a Viernes 8:30 a 18:00hs<br>
      Teléfonos Útiles<br>
      Whatsapp: 155-508247<br>
      Sepelio: 4235108 / 154-057991<br>
      SOS Emergencias: 4222322 / 4233333<br>
      www.amparosrl.com.ar
    </div>
</div>


@endsection
