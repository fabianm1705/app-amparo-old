<template>
  <div class="d-flex">
    <button @click="addToCart"
          class="btn btn-sm btn-outline-success btn-block"
          type="submit"
          name="button">Comprar
    </button>
  </div>
</template>

<script>
    export default {
      props: {
          product:{ type: Object }
      },
      methods:{
        addToCart(){
          var product_id = this.product.id;
          axios.post('/in_shopping_cart/'+product_id)
            .then(()=>{
              this.$store.commit('increment');
            })
          this.cartroute;
        }
      }
    }
</script>
