@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-header bgOrange d-flex">
          <h5 class="card-title text-white">Órdenes Médicas</h5>
          <div class="ml-auto blanco">
            @can('orders.crear')
              <a href="{{ route('orders.crear') }}" title="Nueva">
                Nueva Orden
              </a>
            @endcan
           </div>
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
              <th>Lugar</th>
              <th>Obs</th>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                  <td>{{ $order->id+5000 }}</td>
                  <td>{{ \Carbon\Carbon::parse($order->fecha)->format('d/m/Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($order->fechaImpresion)->format('d/m/Y') }}</td>
                  <td>{{ $order->user->group->nroSocio }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>{{ $order->doctor->apeynom }}</td>
                  <td>{{ $order->lugarEmision }}</td>
                  <td>{{ $order->obs }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $orders->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
