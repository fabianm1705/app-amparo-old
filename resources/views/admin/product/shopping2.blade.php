@extends('layouts.app')

@section('myLinks')
  <script>
    function cargarProductos(){
      var id = document.getElementById('category').value;
      axios.post('/getProductsXCategory/'+id)
        .then((resp)=>{
            var cont = document.getElementById("tablaprofesionales").rows.length;
        })
        .catch(function (error) {console.log(error);})
    }
  </script>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 col-sm-12">
        <div class="card shadow-sm">
          <div class="card-body">
            <label for="category">Seleccione Categoría:</label>
            <select class="custom-select" name="category" id="category" onchange="cargarProductos()">
              <option selected value="0">Ver todos los Productos</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->nombre }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-4">
      <div class="col-md-12">
        <shopping-component
          :products="{{$products}}"
          :porccuotas="{{$porccuotas}}"
          :porccredito="{{$porccredito}}">
        </shopping-component>
      </div>
    </div>
  </div>
@endsection
