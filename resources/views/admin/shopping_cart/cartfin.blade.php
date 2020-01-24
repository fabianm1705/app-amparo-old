@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-9">
        <div class="container alert alert-success">
          Gracias por tu compra! En breve nos pondremos en contacto para coordinar envío...
        </div>
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
                  <th></th>
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
                    <td class="align-middle text-center">
                      1
                    </td>
                    <td class="align-middle">
                      <small>$</small>{{ $product->costo * (1+($porccredito/100)) }}
                    </td>
                    <td class="td-actions align-middle">
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
    </div>
  </div>
@endsection
