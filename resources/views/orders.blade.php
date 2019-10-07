@extends('layouts.app')

@section('content')
<div class="container seccion-contacto my-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4 ml-auto mr-auto">
            <h3 class="title text-center">
                Emisión de Órdenes
            </h3>
            <form action="{{ route('orders.store') }}" method="post">
                @csrf
                <div class="row">
                  <select class="custom-select form-control" name="pacient_id" id="pacient_id">
                    <option selected>Seleccione Paciente</option>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div><br>
                <specialty-doctors-select-component></specialty-doctors-select-component>
                <generar-orden-component></generar-orden-component>
            </form><br>
        </div>

        <div class="col-md-7 ml-auto mr-auto">
          <h3 class="title text-center">
              Órdenes Anteriores
          </h3>
          <table class="table table-sm">
            <thead>
              <tr>
                <th class="text-center">Fecha</th>
                <th>Paciente</th>
                <th>Profesional</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                  <td>{{ \Carbon\Carbon::parse($order->fecha)->format('d/m/Y') }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>{{ $order->doctor->apeynom }}</td>
                  <td class="text-right d-flex">
                    <a href="{{ route('pdf') }}" title="Reimprimir" class="">
                      <div class="">
                        <i class="material-icons">printer</i>
                      </div>
                    </a>&nbsp;
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
