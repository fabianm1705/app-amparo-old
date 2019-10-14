<template>
  <section>
    <div class="row">
      <select @click="limitOrders" class="custom-select form-control" name="pacient_id" id="pacient_id">
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
      <input class="btn btn-outline-success btn-block" id="btnGenerarOrden" type="submit" value="Generar Orden" />
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
        messageCostoOrden:"",
        montoCostoOrden:"",
        outlimit:false,
      }
    },
    mounted() {
      axios.get('getSpecialties').then(response=>{
        this.specialties = response.data;
      });
      axios.get('getUsers').then(response=>{
        this.users = response.data;
      });
    },
    methods:{
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
        },
        limitOrders(){
          var id = document.getElementById('pacient_id').value;
          this.messageCostoOrden="";
          this.montoCostoOrden="";
          document.getElementById('specialty').value=0;
          document.getElementById('specialty').text="Seleccione Especialidad";
          document.getElementById('doctor_id').value=0;
          document.getElementById('doctor_id').text="Seleccione Profesional";
          axios.post('limitOrders/'+id)
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
      }
    }
</script>
