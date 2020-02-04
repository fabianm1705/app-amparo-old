@extends('layouts.app')

@section('myLinks')
  <script>
    function cargarCarrito(id){
      axios.post('/getProducts/'+id)
        .then((resp)=>{
            var cont = document.getElementById("tablaproductos").rows.length;
            for (i = 0; i < (cont); i++) {
                document.getElementById("borrar").remove();
            }
            for (i = 0; i < Object.keys(resp.data).length; i++) {
                $('<tr id="borrar"><td>' + resp.data[i].modelo + '</td><td>1</td></tr>').appendTo('#tablaproductos');
            }
        })
        .catch(function (error) {console.log(error);})
    }
  </script>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card shadow-sm">
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
                  <td class="align-middle">{{ $shopping_cart->user->group->nroSocio }}</td>
                  <td class="align-middle">{{ $shopping_cart->user->name }}</td>
                  <td class="align-middle">{{ $shopping_cart->fecha }}</td>
                  <td>
                    <button class="btn btn-sm" onclick="cargarCarrito({{ $shopping_cart->id }})" style="background-color: transparent;">
                      <div class="">
                        <i class="material-icons">double_arrow</i>
                      </div>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-body centrado">
          <table class="table table-hover table-sm table-responsive">
            <thead>
              <th>Producto</th>
              <th>Cantidad</th>
            </thead>
            <tbody id="tablaproductos">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
