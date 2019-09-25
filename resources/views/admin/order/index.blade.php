@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 seccion-contacto my-5">
      <div class="card shadow-sm">
        <div class="card-header bgOrange d-flex">
          <h5 class="card-title text-white">Órdenes Médicas</h5>
        </div>
        <div class="card-body">
          <table class="table table-hover table-sm table-responsive">
            <thead>
              <th>Orden</th>
              <th>Emisión</th>
              <th>Impresión</th>
              <th>Socio</th>
              <th>Nombre</th>
              <th>Profesional</th>
              <th>Soc</th>
              <th>Amp</th>
              <th>App</th>
              <th>Estado</th>
              <th>Obs</th>
              <th>Acciones</th>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                  <td>{{ $order->numero }}</td>
                  <td>{{ \Carbon\Carbon::parse($order->fecha)->format('d/m/Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($order->fechaImpresion)->format('d/m/Y') }}</td>
                  <td>{{ $order->partner->group->nroSocio }}</td>
                  <td>{{ $order->partner->apeynom }}</td>
                  <td>{{ $order->doctor->apeynom }}</td>
                  <td>{{ $order->monto_s }}</td>
                  <td>{{ $order->monto_a }}</td>
                  <td>{{ $order->lugarEmision }}</td>
                  <td>{{ $order->estado }}</td>
                  <td>{{ $order->obs }}</td>
                  <td class="text-right d-flex">
                    <a href="{{ route('orders.edit', ['order' => $order ]) }}" title="Editar" class="">
                      <div class="">
                        <i class="material-icons">edit</i>
                      </div>
                    </a>&nbsp;
                    <form action="{{ route('orders.destroy', ['order' => $order ]) }}" method="post" style="background-color: transparent;">
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
