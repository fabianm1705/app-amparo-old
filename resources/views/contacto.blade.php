@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="seccion-contacto my-5">
                <div class="card shadow-sm">
                  <div class="card-header bgOrange d-flex">
                    <h5 class="card-title text-white">Contacto</h5>
                  </div>
                  <div class="card-body">
                    @if (session('estado'))
                        <div class="alert alert-success">
                            {{ session('estado') }}
                        </div>
                    @endif
                    <form method="POST" action="/enviar" class="contact-form {{ (Session::get('errors')) ? 'was-validated' : '' }}"  role="form" id="contact-form" class="">
                        @csrf
                        <div class="messages"></div> <!-- mensajes de error -->

                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Tu nombre *</label>
                                        <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Por favor ingresa tu nombre" required="required" data-error="El nombre es requerido.">

                                            @if($errors->has('nombre'))
                                                <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                                            @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input id="email" type="text" name="email" class="form-control" placeholder="Por favor ingresa tu email" required="required" data-error="Email es requerido.">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mensaje">Mensaje *</label>
                                        <textarea id="mensaje" name="mensaje" class="form-control" placeholder="Tu mensaje" rows="4" required="required" data-error="Por favor incluye un mensaje."></textarea>
                                        @if($errors->has('mensaje'))
                                            <div class="invalid-feedback">{{ $errors->first('mensaje') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-dark btn-send text-white" value="Enviar tu mensaje">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <p class="text-muted">
                                        <strong>*</strong> Campos requeridos.</p>
                                </div>
                            </div>
                        </div>
                    </form> <!-- fin - .contact-form -->
                </div> <!-- fin del componente card -->
            </section> <!-- fin - .seccion-contacto -->
        </div>
    </div>
</div>
@endsection
