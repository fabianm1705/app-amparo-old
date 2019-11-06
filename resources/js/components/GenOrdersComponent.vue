<template>
  <section>
    <div class="row">
      <select @click="checkUser" class="custom-select form-control" name="pacient_id" id="pacient_id">
        <option selected>Seleccione Paciente</option>
        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
      </select>
    </div><br>
    <div class="row">
      <select @click="getDoctors" class="custom-select" name="specialty" id="specialty">
        <option value="0" selected>Seleccione Especialidad</option>
        <option v-for="specialty in specialties" :key="specialty.id" :value="specialty.id">{{ specialty.descripcion }}</option>
      </select>
    </div><br>
    <div class="row">
      <select @click="printCostoOrden" class="custom-select form-control" name="doctor_id" id="doctor_id">
        <option value="0" selected>Seleccione Profesional</option>
        <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">{{ doctor.apeynom }}</option>
      </select>
    </div></br>
    <div class="text-center">
        <h5 class="card-title" id="costoOrden"><small>{{ messageCostoOrden }}</small>{{ montoCostoOrden }}</h5>
        <input type="hidden" class="form-control" name="monto_s" id="monto_s">
        <input type="hidden" class="form-control" name="monto_a" id="monto_a">
    </div>
    <div class="text-center">
      <input v-if="habilitaOrden" class="btn btn-outline-success btn-block" id="btnGenerarOrden" type="submit" value="Generar Orden" />
    </div>
  </section>
</template>

<script>
  export default {
    data: function(){
      return{
        doctors: [],
        specialties: [],
        users: [],
        plans: [],
        layers: [],
        messageCostoOrden:"",
        montoCostoOrden:"",
        outlimit:false,
        habilitaOrden:false,
      }
    },
    mounted() {
      axios.get('getOnlySpecialties').then(response=>{
        this.specialties = response.data;
      });
      axios.get('getOnlyUsers').then(response=>{
        this.users = response.data;
      });
      axios.get('getPlans').then(response=>{
        this.plans = response.data;
      });
    },
    methods:{
        checkUser(){
          var i;
          for (i = 0; i < Object.keys(this.plans).length; i++) {
            if(this.plans[i].emiteOrden==1){
              this.habilitaOrden = true;
              i=Object.keys(this.plans).length;
            }
          };
          if(this.habilitaOrden==false){
            var id = document.getElementById('pacient_id').value;
            axios.post('getLayers/'+id)
              .then((resp)=>{this.layers=resp.data;})
              .catch(function (error) {console.log(error);})
            for (i = 0; i < Object.keys(this.layers).length; i++) {
              if(this.layers[i].emiteOrden==1){
                this.habilitaOrden = true;
                i=Object.keys(this.layers).length;
              }
            };
          }
          if(this.habilitaOrden){
            var id = document.getElementById('pacient_id').value;
            this.messageCostoOrden="";
            this.montoCostoOrden="";
            document.getElementById('specialty').value=0;
            document.getElementById('specialty').text="Seleccione Especialidad";
            document.getElementById('doctor_id').value=0;
            document.getElementById('doctor_id').text="Seleccione Profesional";
            axios.post('cantOrders/'+id)
              .then((respu)=>{
                if (respu.data < 2) {
                  document.getElementById('costoOrden').style.color = '#000000';
                  this.outLimit=false;
                } else {
                  alert("Ya ha emitido " + respu.data + " órdenes en el mes para este socio, la que está por generar tendrá un costo más elevado.");
                  document.getElementById('costoOrden').style.color = '#FF0000';
                  this.outLimit=true;
                }
              })
              .catch(function (error) {console.log(error);})
          }
        },
        printCostoOrden(){
          var id = document.getElementById('specialty').value;
          var i;
          for (i = 0; i < Object.keys(this.specialties).length; i++) {
            if(this.specialties[i].id==id){
              this.messageCostoOrden = "Coseguro único a abonar en consultorio $";
              if (this.outLimit){
                var suma = parseInt(this.specialties[i].monto_s) + parseInt(this.specialties[i].monto_a/2);
                this.montoCostoOrden = suma;
                document.getElementById('monto_s').value=suma;
                document.getElementById('monto_a').value=this.specialties[i].monto_a/2;
              }else{
                this.montoCostoOrden = this.specialties[i].monto_s;
                document.getElementById('monto_s').value=this.specialties[i].monto_s;
                document.getElementById('monto_a').value=this.specialties[i].monto_a;
              }
              i=Object.keys(this.specialties).length;
            }
          };
        },
        getDoctors(){
          var id = document.getElementById('specialty').value;
          axios.post('getDoctors/'+id)
            .then((resp)=>{this.doctors=resp.data;})
            .catch(function (error) {console.log(error);})
        }
      }
    }
</script>
