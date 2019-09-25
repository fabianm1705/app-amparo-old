<template>
  <section class="seccion-contacto my-5">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-6" v-for="product in products" :key="product.id" value="product.id">
        <div class="card card-product card-plain shadow-sm">
          <div class="card-header-image">
            <img class="card-img-top" :src="'images/'+product.image_url" alt="">
          </div>
          <div class="card-body text-center">
            <h4 class="card-title">{{ product.modelo }}</h4>
            <div class="card-description">{{ product.descripcion }}</div>
          </div>
          <h4 class="card-title text-center"><small>{{ product.cantidadCuotas }} cuotas de $</small>{{ product.montoCuota }}</h4>
        </div><br>
      </div>
    </div>
  </section>
</template>

<script>
    export default {
      mounted() {
        axios.get('getProducts').then(response=>{
          this.products = response.data;
        });
      },
      data: function(){
        return{
          products: []
          }
        }
      }
</script>
