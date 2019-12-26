@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-11">
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
                  <th class="th-description">Color</th>
                  <th class="text-right">Precio Unitario</th>
                  <th class="text-left">Cant.</th>
                  <th class="text-left">Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="">
                      <img class="card-img-top" style="width:150px;" src="/images/1573589374motog6b.png" alt="Moto G6">
                    </div>
                  </td>
                  <td class="align-middle">
                    <a href="">Moto G6</a>
                    <br />
                    <small>by Lenovo Motorola</small>
                  </td>
                  <td class="align-middle">
                    Indigo
                  </td>
                  <td class="text-right align-middle">
                    <small>$</small>12000
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
                    <small>$</small>12000
                  </td>
                  <td class="td-actions align-middle">
                    <button type="button" rel="tooltip" data-placement="left" title="Quitar producto" class="btn btn-link">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="">
                      <img class="card-img-top" style="width:150px;" src="/images/1573589374motog6b.png" alt="Moto G6">
                    </div>
                  </td>
                  <td class="align-middle">
                    <a href="">Moto G6</a>
                    <br />
                    <small>by Lenovo Motorola</small>
                  </td>
                  <td class="align-middle">
                    Indigo
                  </td>
                  <td class="text-right align-middle">
                    <small>$</small>12000
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
                    <small>$</small>12000
                  </td>
                  <td class="td-actions align-middle">
                    <button type="button" rel="tooltip" data-placement="left" title="Quitar producto" class="btn btn-link">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td class="td-total">
                    Total
                  </td>
                  <td colspan="1" class="td-price">
                    <small>$</small>12000
                  </td>
                  <td colspan="1"></td>
                  <td colspan="2" class="text-right">
                    <button type="button" class="btn btn-info btn-round">Completar compra <i class="material-icons">keyboard_arrow_right</i></button>
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
