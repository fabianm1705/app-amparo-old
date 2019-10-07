<template>
  <section>
    <div class="row">
        <div class="col-md-6">
          <center>
            <h4 class="card-title" id="costoorden2">
            </h4>
          </center>
        </div>
        <div class="col-md-6">
          <div class="footer text-center">
              <input class="btn btn-success" id="btnGenerarOrden" type="submit" value="Generar Orden" />
          </div>
        </div>
    </div>
  </section>
</template>

<script>
    export default {
      mounted() {
        axios.get('getSpecialties').then(response=>{
          this.specialties = response.data;
        });
      },
      data: function(){
        return{
          doctors: [{apeynom:'Seleccione especialidad...', direccion:'',telefono:''}],
          specialties: [],
        }
      },
      methods:{
          getDoctors(){
            var id = document.getElementById('specialty').value;
            axios.post('getDoctors/'+id)
              .then((resp)=>{this.doctors=resp.data;})
              .catch(function (error) {console.log(error);})
          }
        }
      }
</script>
