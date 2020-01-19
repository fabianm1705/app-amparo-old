@extends('layouts.app')

@section('myLinks')
  <script>
    function cargarProfesionales(){
      var id = document.getElementById('specialty').value;
      axios.post('/getDoctors/'+id)
        .then((resp)=>{
            var cont = document.getElementById("tablaprofesionales").rows.length;
            for (i = 0; i < (cont); i++) {
                document.getElementById("borrar").remove();
            }
            for (i = 0; i < Object.keys(resp.data).length; i++) {
                $('<tr id="borrar"><td>' + resp.data[i].apeynom + '</td><td>' + resp.data[i].direccion + '</td><td>' + resp.data[i].telefono + '</td></tr>').appendTo('#tablaprofesionales');
            }
        })
        .catch(function (error) {console.log(error);})
    }
  </script>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bgOrange d-flex">
            <h5 class="card-title text-white">Profesionales</h5>
          </div>
          <div class="card-body justify-content-center">
            <div>
              <select class="custom-select" name="specialty" id="specialty" onchange="cargarProfesionales()">
                <option selected>Seleccione especialidad</option>
                @foreach($specialties as $specialty)
                  <option value="{{ $specialty->id }}">
                      {{ $specialty->descripcion }}
                  </option>
                @endforeach
              </select>
            </div><br>
            <div>
              <table class="table table-hover table-sm table-responsive">
                <thead>
                  <th>Nombre</th>
                  <th>Consultorio</th>
                  <th>Teléfono</th>
                </thead>
                <tbody id="tablaprofesionales">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
