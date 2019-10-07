<template>
  <section>
    <div class="row">
      <select @click="getDoctors" class="custom-select" name="specialty" id="specialty">
        <option selected>Seleccione Especialidad</option>
        <option v-for="specialty in specialties" :key="specialty.id" :value="specialty.id">{{ specialty.descripcion }}</option>
      </select>
    </div><br>
    <div class="row">
      <select class="custom-select form-control" name="doctor_id" id="doctor_id">
        <option selected>Seleccione Profesional</option>
        <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">{{ doctor.apeynom }}</option>
      </select>
    </div></br>
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
