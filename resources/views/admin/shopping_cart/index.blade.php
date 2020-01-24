@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="card shadow-sm">
        <div class="card-header bgOrange d-flex">
          <h5 class="card-title text-white">Carritos Vendidos</h5>
        </div>
        <div class="card-body centrado">
          <table class="table table-hover table-sm table-responsive">
            <thead>
              <th>Nro. Socio</th>
              <th>Nombre</th>
              <th>Fecha</th>
              <th class="text-center">Acciones</th>
            </thead>
            <tbody>
              @foreach($shopping_carts as $shopping_cart)
                <tr>
                  <td>{{ $shopping_cart->user->group->nroSocio }}</td>
                  <td>{{ $shopping_cart->user->name }}</td>
                  <td class="text-justify">{{ $shopping_cart->fecha }}</td>
                  <td class="text-center">
                    <input type="checkbox" class="form-check-input" id="vigente" name="vigente" disabled value="1" {{ $product->vigente ? 'checked="checked"' : '' }}>
                  </td>
                  <td class="text-right d-flex">
                    @can('carrito')
                      <a href="{{ route('shopping_cart.show', ['shopping_cart' => $shopping_cart ]) }}" title="Ver" class="">
                        <div class="">
                          <i class="material-icons">search</i>
                        </div>
                      </a>&nbsp;
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
