<template>
  <div>
    6 cuotas de ${{ formatPrice(cuota) }}
  </div>
</template>

<script>
    export default {
      props: {
        products:{ type: Array },
        porccuotas:{ type: Number }
      },
      computed:{
        cuota: function(){
          let cents = this.products.reduce((acumulator,currentObj)=>{
            return acumulator + (currentObj.costo * (1+(this.porccuotas/100)) / 6);
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
