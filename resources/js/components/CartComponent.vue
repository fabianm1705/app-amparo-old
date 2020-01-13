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
          <product-in-cart-component
                  v-for="(product,index) in products"
                  :data-index="index"
                  :key="product.id"
                  :value="product.id"
                  :porccuotas="porccuotas"
                  :porccredito="porccredito"
                  :product="product"
                  class="col-md-4 col-sm-6 col-xs-6">
          </product-in-cart-component>
          <tr>
            <td colspan="3"></td>
            <td class="td-total">
              Total
            </td>
            <td colspan="1" class="td-price">
              {{total}}
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
        porccuotas:{ type: Number },
        porccredito:{ type: Number },
        products:{ type: Array }
      },
      computed:{
        total(){
          let cents = this.products.reduce((acumulator,currentObj)=>{
            return acumulator + currentObj.montoCuota;
          },0);

          return `$${cents}`;
        }
      }
    }
</script>
