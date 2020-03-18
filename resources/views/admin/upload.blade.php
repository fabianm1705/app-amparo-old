@extends('layouts.app')

@section('content')
  <div class="col-md-4"><br>
    <div class="card card-contact">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="card-header card-header-raised card-header-primary text-center">
          <h4 class="card-title">Selecciona los archivos a subir</h4>
        </div>
          <br>
          <div class="card-body">
            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"><br>
            <input type="file" name="fileToUpload2" id="fileToUpload2" class="form-control"><br>
            <input type="file" name="fileToUpload3" id="fileToUpload3" class="form-control"><br>
            <input type="file" name="fileToUpload4" id="fileToUpload4" class="form-control"><br>
            <input type="submit" value="Subir y Actualizar" name="submit" class="btn btn-primary pull-right">
          </div>
      </form>
    </div>
  </div>
@endsection
