<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NoticiaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $titulo;
    public $introduccion;
    public $mensaje;
    public $imagenes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo,$introduccion,$mensaje,$imagenes)
    {
        $this->titulo = $titulo;
        $this->introduccion = $introduccion;
        $this->mensaje = $mensaje;
        $this->imagenes = $imagenes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('email.noticia')->subject($this->titulo);
        if($this->imagenes != ''){
            foreach($this->imagenes as $imagen){
                set_time_limit(0);
                $email->attach($imagen->getRealPath(), array(
                    'as' => $imagen->getClientOriginalName(),
                    'mime' => $imagen->getMimeType()) 
                );
            }
        }
        return $email;
    }
}
