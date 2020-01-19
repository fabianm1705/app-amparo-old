<template>
  <div class="">
    <a :href="'/admin/products/'+product.id" style="text-decoration:none;">
      <div class="card card-product card-plain shadow-sm">
        <div class="card-header-image">
          <img class="card-img-top" :src="'../images/'+product.image_url" :alt="product.modelo">
        </div>
        <div class="card-body text-center">
          <div class="card-description" style="height: 70px;overflow:auto;">
            {{ product.modelo }}<small> - {{ product.descripcion }}</small>
          </div>
        </div>
        <h6 class="card-title text-center">
          <small>{{ product.cantidadCuotas }} cuotas de $</small>{{ formatPrice(product.costo * (1+(porccuotas/100)) / product.cantidadCuotas) }}<br>
          <small>Crédito en 1 pago de $</small>{{ formatPrice(product.costo * (1+(porccredito/100))) }}
        </h6>
      </div>
    </a><br>
  </div>
</template>

<script>
    export default {
        props: {
            product:{ type: Object },
            porccuotas:{ type: Number },
            porccredito:{ type: Number }
        },
        methods:{
            formatPrice(value) {
                    let val = (value/1).toFixed(2).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        }
    }
</script>
