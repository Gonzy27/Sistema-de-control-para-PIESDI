@component('mail::message')
# Solicitud de {{$solicitud->nombreEmisor}}, {{$solicitud->cargoEmisor}}

{{$mensaje}}
@component('mail::panel')
{!! nl2br($solicitud->mensaje) !!}
@endcomponent

Enviado por medio de formulario de contacto<br>
@endcomponent
