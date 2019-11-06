<template>
  <section class="seccion-contacto my-5">
    <div class="col-lg-9">
      <div class="card shadow-sm">
        <div class="card-header bgOrange d-flex">
          <h5 class="card-title text-white">Profesionales</h5>
        </div>
        <div class="card-body">
          <div>
            <select @click="getDoctors" class="custom-select" name="specialty" id="specialty">
              <option selected>Seleccione especialidad</option>
              <option v-for="specialty in specialties" :key="specialty.id" :value="specialty.id">{{ specialty.descripcion }}</option>
            </select>
          </div><br>
          <div><center>
            <table class="table table-hover table-sm table-responsive">
              <thead>
                <th>Nombre</th>
                <th>Consultorio</th>
                <th>Teléfono</th>
              </thead>
              <tbody>
                <tr v-for="doctor in doctors" :key="doctor.id" value="doctor.id">
                  <td>{{ doctor.apeynom }}</td>
                  <td>{{ doctor.direccion }}</td>
                  <td class="text-center">{{ doctor.telefono }}</td>
                </tr>
              </tbody>
            </table></center>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
    export default {
      mounted() {
        axios.get('getOnlySpecialties').then(response=>{
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
