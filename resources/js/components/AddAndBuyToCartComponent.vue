<template>
  <div class="d-flex">
    <button @click="addToCart(product.id)"
          class="btn btn-sm btn-outline-success btn-block"
          type="submit"
          name="button"><a href="/carrito" style="text-decoration:none;color:black;">Comprar</a>
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
              this.$store.commit('increment');
            })
        }
      }
    }
</script>
