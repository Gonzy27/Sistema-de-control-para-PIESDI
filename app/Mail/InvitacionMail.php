<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvitacionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $titulo;
    public $mensaje;
    public $imagen;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo,$mensaje,$imagen)
    {
        $this->titulo = $titulo;
        $this->mensaje = $mensaje;
        $this->imagen = $imagen;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->imagen != ''){
        return $this->markdown('email.invitacion')->subject($this->titulo)->attach($this->imagen->getRealPath(), array(
                'as' => $this->imagen->getClientOriginalName() . $this->imagen->getClientOriginalExtension(),
                'mime' => $this->imagen->getMimeType()) 
            );
        }else{
            return $this->markdown('email.invitacion')->subject($this->titulo);
        }
    }
}
