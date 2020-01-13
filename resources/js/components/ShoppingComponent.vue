<template>
<section>
<div class="row">
  <div class="col-md-3">

    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="radio-inline">
            <label>
                <input type="radio" checked="checked" name="categorias" value="0" />
                <span>Todos</span>
            </label>
        </div>
        <span class="badge badge-warning badge-pill"></span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center"
          v-for="category in categoriesConTotal">
        <div class="radio-inline">
            <label>
                <input type="radio" :key="category.id" :value="category.id" name="categorias" />
                <span>{{ category.nombre }}</span>
            </label>
        </div>
        <span class="badge badge-success badge-pill">{{ category.total }}</span>
      </li>
    </ul>
    <br>
    <div class="text-right">
      <button @click="getProductsXCategory" class="btn btn-success btn-block" type="submit" name="button">Actualizar Filtro</button>
    </div>
    <br>
    <h5>Medios de Pago</h5>
    <hr>
    <div class="">
      <div class="row align-items-center">
        <div class="col-3">
          <img class="w-100" src="/images/favicon.png" alt="">
        </div>
        <div class="col-9">
          <h5>Cuotas de la Casa</h5>
        </div>
      </div>
    </div>
    <div class="justify-content-center">
      <hr><img class="card-img-top w-75" src="/images/mp.jpg" alt="Todos los medios de pago">
    </div>
  </div>
  <div class="col-md-9">
    <material-transition-group-component tag="div" class="row">
        <product-in-shopping-component
                v-for="(product,index) in products"
                :data-index="index"
                :key="product.id"
                :value="product.id"
                :porccuotas="porccuotas"
                :porccredito="porccredito"
                :product="product"
                class="col-md-4 col-sm-6 col-xs-6">
        </product-in-shopping-component>
    </material-transition-group-component>
  </div>
</div>
</section>
</template>

<script>
    export default {
      props: {
        categories:{ type: Array },
        product:{ type: Object },
        porccuotas:{ type: Number },
        porccredito:{ type: Number },
        contados:{ type: Array }
      },
      data: function(){
        return{
          products: []
        }
      },
      mounted() {
        axios.post('/getProductsXCategory/'+0).then(response=>{
          this.products = response.data;
        }).catch(function (error) {
          console.log(error)
        });
      },
      computed: {
          categoriesConTotal: function () {
            // utilizando map se agrega la propiedad total por cada elemento del array categories
            let categoriesConTotal = this.categories.map(p => {
              p.total = this.contados.find( (el) => { return el.nombre === p.nombre } ).products_count
              return p
            })
            return categoriesConTotal
          }
        },
      methods:{
        getProductsXCategory(){
          var radios=document.getElementsByName('categorias');
          var i;
          for(i=0; i<radios.length; i++){
            if(radios[i].checked){
              var id=radios[i].value;
              axios.post('/getProductsXCategory/'+id)
                .then((resp)=>{
                  this.products=resp.data;
                }).catch(function (error) {
                  console.log(error);
                })
            }
          }
        }
      }
    }
</script>
