@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-9">
        <div class="card shadow-sm">
          <div class="card-header bgOrange d-flex blanco">
            <h5 class="card-title text-white">Carrito de Compras</h5>
            <br/>
          </div>
          <div class="table-responsive">
            <table class="table table-shopping">
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th>Producto</th>
                  <th class="text-right">P. Unit.</th>
                  <th class="text-center">Cant.</th>
                  <th class="text-left">Total</th>
                  <th>Quitar</th>
                </tr>
              </thead>
              <tbody>
                @foreach($shopping_cart->products as $product)
                  <tr id="{{ $product->id }}">
                    <td>
                      <div class="">
                        <img class="card-img-top" style="width:100px;" src="{{ asset('images/'.$product->image_url) }}" alt="{{ $product->modelo }}">
                      </div>
                    </td>
                    <td class="align-middle">
                      <a href="" style="text-decoration:none;color:black;">{{ $product->modelo }}</a>
                      <br />
                      <small>by {{ $product->empresa }}</small>
                    </td>
                    <td class="text-right align-middle">
                      <small>$</small>{{ $product->costo * (1+($porccredito/100)) }}
                    </td>
                    <td class="align-middle">
                      1
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="option1" checked> -
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="option2"> +
                        </label>
                      </div>
                    </td>
                    <td class="align-middle">
                      <small>$</small>{{ $product->costo * (1+($porccredito/100)) }}
                    </td>
                    <td class="td-actions align-middle">
                      <form action="{{ route('deleteOfCart', ['id' => $product->id ]) }}" method="post" style="background-color: transparent;">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm" onclick="return confirm('Está seguro de eliminar el registro?')">
                          <i class="material-icons">close</i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                <tr>
                  <td colspan="3"></td>
                  <td class="td-total">
                    Total
                  </td>
                  <td colspan="1" class="td-price">
                    <total-value-only-component
                            :products="{{ $shopping_cart->products }}"
                            :porccredito="{{ $porccredito }}">
                    </total-value-only-component>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <h5>Seleccione su medio de pago:</h5>

        <div class="card shadow-sm">
          <div class="card-body">
            <div class="row align-items-center justify-content-center">
              <div class="col-3">
                <img class="w-100" src="/images/favicon.png" alt="">
              </div>
              <div class="col-9 row align-items-center">
                <cuotas-value-component
                        :products="{{ $shopping_cart->products }}"
                        :porccuotas="{{ $porccuotas }}">
                </cuotas-value-component>
              </div>
            </div>
            <div class="mt-2">
              <form action="{{ route('shopping_cart.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="text-right">
                  <button class="btn btn-outline-success btn-block" type="submit" name="button">Finalizar Compra</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card shadow-sm mt-2">
          <div class="card-body">
            <div><center>
              <total-value-component
                      :products="{{ $shopping_cart->products }}"
                      :porccredito="{{ $porccredito }}">
              </total-value-component>
            </center>
          </div><hr>
            <div class="justify-content-center">
              <center><img class="card-img-top w-100" src="/images/mercadopago.png" alt="Todos los medios de pago"></center>
            </div>
            <div class="mt-2">
                <div class="text-right">
                  <button class="btn btn-outline-success btn-block" type="submit" name="button">Finalizar Compra</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
