@component('mail::message')
# {{ $datos['nombre'] }}
email: {{ $datos['email'] }}
mensaje:
@component('mail::panel')
    {{ $datos['mensaje'] }}
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
