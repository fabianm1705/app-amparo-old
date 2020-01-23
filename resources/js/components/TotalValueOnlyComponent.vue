<template>
  <section>
    ${{ formatPrice(total) }}
  </section>
</template>

<script>
    export default {
      props: {
        products:{ type: Array },
        porccredito:{ type: Number }
      },
      computed:{
        total: function(){
          let cents = this.products.reduce((acumulator,currentObj)=>{
            return acumulator + (currentObj.costo * (1+(this.porccredito/100)));
          },0);
          return `${cents}`;
        }
      },
      methods:{
          formatPrice(value) {
                  let val = (value/1).toFixed(2).replace('.', ',')
                  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          }
      }
    }
</script>
