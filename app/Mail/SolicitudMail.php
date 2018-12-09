<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use App\Solicitud;

class SolicitudMail extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud;
    public $tituto;
    public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Solicitud $solicitud, $titulo, $mensaje)
    {
        $this->solicitud = $solicitud;
        $this->titulo = $titulo;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.solicitud')->subject($this->titulo. $this->solicitud->asunto);
    }
}
