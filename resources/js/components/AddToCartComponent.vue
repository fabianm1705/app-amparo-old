<template>
  <div class="d-flex">
    <button @click="addToCart"
          title="agregar al Carrito"
          class="btn btn-sm"
          type="submit"
          name="button"
          style="background-color:transparent">
      <small><i class="material-icons">shopping_cart</i></small>+
    </button>
  </div>
</template>

<script>
    export default {
      props: { product:{ type: Object } },
      methods:{
        addToCart(){
          var product_id = this.product.id;
          axios.post('/in_shopping_cart/'+product_id)
            .then(()=>{
              this.$store.commit('increment');
            })
        }
      }
    }
</script>
