<template>
  <section>
    <div class="card shadow-sm mt-3">
      <div class="card-body">
        <div><center>
          Crédito en 1 pago de ${{ formatPrice(total) }}<br>
        </center>
      </div><hr>
        <div class="justify-content-center">
          <center><img class="card-img-top w-100" src="/images/mercadopago.png" alt="Todos los medios de pago"></center>
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
        total:{ type: Number }
      },
      methods:{
          formatPrice(value) {
                  let val = (value/1).toFixed(2).replace('.', ',')
                  return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          }
      }
    }
</script>
