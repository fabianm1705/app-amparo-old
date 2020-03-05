@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <shopping-component
                :categories="{{$categories}}"
                :porccuotas="{{$porccuotas}}"
                :porccredito="{{$porccredito}}"
                :payment_methods="{{$payment_methods}}"
                :contados="{{$contados}}">
        </shopping-component>
      </div>
    </div>
  </div>
@endsection
