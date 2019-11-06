<template>

<div class="row">
  <div class="col-md-3">

    <ul class="list-group shadow-sm">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="radio-inline">
            <label>
                <input type="radio" checked="checked" name="categorias" value="0" />
                <span>Todos</span>
            </label>
        </div>
        <span class="badge badge-success badge-pill">14</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center"
          v-for="category in categories">
        <div class="radio-inline">
            <label>
                <input type="radio" :key="category.id" :value="category.id" name="categorias" />
                <span>{{ category.nombre }}</span>
            </label>
        </div>
        <span class="badge badge-success badge-pill">14</span>
      </li>
    </ul>
    <br>
    <div class="text-right">
      <button @click="getCategory" class="btn btn-outline-dark" type="submit" name="button">Actualizar Filtro</button>
    </div>
    <br>
  </div>
  <div class="col-md-9">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-6" v-for="product in products" :key="product.id" value="product.id">
        <img class="card-img-top" src="images/motog6b.png" alt="">
        <div class="card card-product card-plain shadow-sm">
          <div class="card-header-image">
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">{{ product.modelo }}</h5>
            <div class="card-description" style="height: 70px;overflow:auto;"><small>{{ product.descripcion }}</small></div>
          </div>
          <h5 class="card-title text-center"><small>{{ product.cantidadCuotas }} cuotas de $</small>{{ product.montoCuota }}</h5>
        </div><br>
      </div>
    </div>
  </div>
</div>
</template>


<script>
    export default {
      mounted() {
        axios.get('getProducts').then(response=>{
          this.products = response.data;
        });
        axios.get('getCategories').then(resp=>{
          this.categories = resp.data;
        });
      },
      data: function(){
        return{
          products: [],
          categories: []
          }
        },
      methods:{
        getCategory(){
          var radios=document.getElementsByName('categorias');
          var i;
          for(i=0; i<radios.length; i++){
            if(radios[i].checked){
              var id=radios[i].value;
              axios.post('getCategory/'+id)
                .then((resp)=>{this.products=resp.data;})
                .catch(function (error) {console.log(error);})
            }
          }
        }
      }
    }
</script>
