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
          <a href="{{ route('pdf',['id' => $order->id]) }}" title="Reimprimir" class="">
            <div class="">
              <i class="material-icons">printer</i>
            </div>
          </a>&nbsp;
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $orders->links() }}
