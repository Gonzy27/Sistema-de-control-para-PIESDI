@component('mail::message')
# Mensaje enviado del PIESDI

@component('mail::panel')
{{$introduccion}}
@endcomponent

@component('mail::panel')
{!! nl2br($mensaje) !!}
@endcomponent

PIESDI
@endcomponent
