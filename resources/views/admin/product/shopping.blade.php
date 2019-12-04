@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <ecommerce-component :categories="{{$categories}}" :contados="{{$contados}}"></ecommerce-component>
      </div>
    </div>
  </div>
@endsection