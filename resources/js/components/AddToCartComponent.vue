<template>
  <div class="d-flex">
    <button @click="addToCart"
          alt="loquesea"
          title="agregar al Carrito"
          scr="loquesea"
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
          axios.post('/in_shopping_carts/'+product_id)
            .then(()=>{
              console.log('Producto agregado');
              this.$store.commit('increment');
            })
        }
      }
    }
</script>
