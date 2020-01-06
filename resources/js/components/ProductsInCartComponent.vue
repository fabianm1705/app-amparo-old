<template>
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
          <tr v-for="product in products" :key="product.id">
            <td>
              <div class="">
                <img class="card-img-top" style="width:100px;" :src="'../images/'+product.image_url" :alt="product.modelo">
              </div>
            </td>
            <td class="align-middle">
              <a href="" style="text-decoration:none;color:black;">{{ product.modelo }}</a>
              <br />
              <small>by {{ product.empresa }}</small>
            </td>
            <td class="text-right align-middle">
              <small>$</small>{{ product.montoCuota }}
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
              <small>$</small>{{ product.montoCuota }}
            </td>
            <td class="td-actions align-middle">
                <button class="btn btn-sm" onclick="return confirm('Quiere quitar el producto del carrito?')" title="Quitar producto">
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
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
    export default {
      props: {
        products:{ type: Array }
      }
    }
</script>
