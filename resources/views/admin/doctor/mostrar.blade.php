@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <specialty-doctors-table-component :specialties="{{$specialties}}"></specialty-doctors-table-component>
      </div>
    </div>
  </div>
@endsection
