@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <shopping-component
                :categories="{{$categories}}"
                :payment_methods="{{$payment_methods}}"
                :porccuotas="{{$porccuotas}}"
                :porccredito="{{$porccredito}}"
                :contados="{{$contados}}">
        </shopping-component>
      </div>
    </div>
  </div>
@endsection
