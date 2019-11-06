<template>
    <div class="row">
      <div class="col-md-6">
        <h4 class="title text-center mb-3">
            Búsqueda del Socio
        </h4>
        <input type="text" class="form-control mb-1" id="name" name="name" placeholder="Nombre" autocomplete="off">
        <input type="text" class="form-control mb-2" id="nroDoc" name="nroDoc" placeholder="Documento" autocomplete="off">
        <button class="btn btn-outline-dark btn-block" @click="getOnlyUsersAdmin">
          <i class="material-icons">search</i>
        </button>
        <h4 class="title text-center mt-2">
            Resultados
        </h4>
        <table class="table table-hover table-sm table-responsive">
          <thead>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Domicilio</th>
            <th>Ver Ord.</th>
          </thead>
          <tbody>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.name }}</td>
                <td>{{ user.nroDoc }}</td>
                <td>{{ user.group.direccion }}</td>
                <td>
                  <button class="btn btn-sm" @click="selectCheckUserGetOrders(user.id)">
                    <i class="material-icons">exit_to_app</i>
                  </button>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <h4 class="title text-center">
            Órdenes Anteriores
        </h4>
        <table class="table table-sm">
          <thead>
            <tr>
              <th class="text-center">Fecha</th>
              <th>Profesional</th>
              <th>Obs.</th>
            </tr>
          </thead>
          <tbody id="tableOrders">
            <tr v-for="order in orders" :key="order.id">
              <td>{{ order.fecha }}</td>
              <td>{{ order.doctor.apeynom }}</td>
              <td>{{ order.obs }}</td>
            </tr>
          </tbody>
        </table>
        <select @click="getDoctors" class="custom-select mb-1 mt-2" name="specialty" id="specialty">
          <option value="0" selected>Seleccione Especialidad</option>
          <option v-for="specialty in specialties" :key="specialty.id" :value="specialty.id">{{ specialty.descripcion }}</option>
        </select>
        <select @click="printCostoOrden" class="custom-select form-control mb-1" name="doctor_id" id="doctor_id">
          <option value="0" selected>Seleccione Profesional</option>
          <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">{{ doctor.apeynom }}</option>
        </select>
        <textarea class="form-control mb-2" id="obs" name="obs" rows="2" placeholder="Observaciones" autocomplete="off"></textarea>
        <div class="text-center">
            <h5 class="card-title" id="costoOrden"><small>{{ messageCostoOrden }}</small>{{ montoCostoOrden }}</h5>
            <input type="hidden" name="monto_s" id="monto_s">
            <input type="hidden" name="monto_a" id="monto_a">
        </div>
        <div class="text-center">
          <input type="submit" v-if="habilitaOrden" class="btn btn-outline-success btn-block" @click="storeOrden" value="Generar Orden" />
        </div>

      </div>
    </div>
</template>

<script>
  export default {
    data: function(){
      return{
        users: [],
        orders: [],
        doctors: [],
        specialties: [],
        plans: [],
        layers: [],
        messageCostoOrden:"",
        montoCostoOrden:"",
        outlimit:false,
        habilitaOrden:false,
      }
    },
    mounted() {
      axios.get('getOnlyAllActiveSpecialties').then(response=>{
        this.specialties = response.data;
      });
    },
    methods:{
      storeOrden(){
        axios.post('storeOrden', {
          doctor_id: document.getElementById('doctor_id').value,
          specialty_id: document.getElementById('specialty').value,
          monto_s: document.getElementById('monto_s').value,
          monto_a: document.getElementById('monto_a').value,
          estado: 'Impresa',
          lugarEmision: 'Sede Amparo',
          pacient_id: this.users[0].id,
          obs: document.getElementById('obs').value
        })
        axios.get('pdf')
      },
      getDoctors(){
        var idSpecialty = document.getElementById('specialty').value;
        axios.post('getDoctors/'+idSpecialty)
          .then((resp)=>{this.doctors=resp.data;})
          .catch(function (error) {console.log(error);})
      },
      selectCheckUserGetOrders(id){
        var i;
        var j = 0;
        var h = this.users.length;
        this.habilitaOrden=false;
        for (i = 0; i < h; i++) {
          if(this.users[j].id!==id){
            //limpia users, deja solo el seleccionado
            this.users.splice(j, 1);
          }else{
            j=1;
          }
        };
        axios.post('getOnlyOrders/'+id)
          .then((resp)=>{
            this.orders=resp.data;
          }).catch(function (error) {
            console.log(error);
          })
          var i;
          var idGroup = this.users[0].group_id;
          axios.post('getPlans/'+idGroup)
            .then((resp)=>{
              this.plans=resp.data;
              for (i = 0; i < Object.keys(this.plans).length; i++) {
                if(this.plans[i].emiteOrden==1){
                  this.habilitaAvisos(this.users[0].id);
                  this.habilitaOrden=true;
                  i=Object.keys(this.plans).length;
                }
              };
              if(this.habilitaOrden==false){
                var id = this.users[0].id;
                console.log("volvio a false");
                axios.post('getLayers/'+id)
                  .then((resp)=>{
                    this.layers=resp.data;
                    for (i = 0; i < Object.keys(this.layers).length; i++) {
                      if(this.layers[i].emiteOrden==1){
                        this.habilitaAvisos(id);
                        this.habilitaOrden=true;
                        i=Object.keys(this.layers).length;
                      }
                    };
                  })
                  .catch(function (error) {
                    console.log(error);
                  })
              }
            })
            .catch(function (error) {
              console.log(error);
            })
      },
      habilitaAvisos(id){
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
          .catch(function (error) {
            console.log(error);
          })
      },
      getOnlyUsersAdmin(){
        var name = document.getElementById('name').value;
        var nroDoc = document.getElementById('nroDoc').value;
        if(name){
          axios.post('getOnlyUsersAdmin/'+name+'/'+nroDoc+'/')
            .then((resp)=>{
              this.users=resp.data;
            }).catch(function (error) {
              console.log(error);
            })
        }else if(nroDoc){
          axios.post('getOnlyUsersNroDocAdmin/'+nroDoc+'/')
            .then((resp)=>{
              this.users=resp.data;
            }).catch(function (error) {
              console.log(error);
            })
        }
      },
      printCostoOrden(){
        var idSpecialty = document.getElementById('specialty').value;
        var i;
        for (i = 0; i < Object.keys(this.specialties).length; i++) {
          if(this.specialties[i].id==idSpecialty){
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
    }
  }
</script>
