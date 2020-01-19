<template>
  <section>
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="row align-items-center justify-content-center">
          <div class="col-3">
            <img class="w-100" src="/images/favicon.png" alt="">
          </div>
          <div class="col-9">
            <h6>6 cuotas de ${{ formatPrice(cuota) }}</h6>
          </div>
        </div>
        <div class="mt-2">
          <div class="text-right">
            <button class="btn btn-outline-success btn-block" type="submit" name="button">Finalizar Compra</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
    export default {
      props: {
        cuota:{ type: Number }
      },
      methods:{
          formatPrice(value) {
                  let val = (value/1).toFixed(2).replace('.', ',')
                  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          }
      }
    }
</script>
