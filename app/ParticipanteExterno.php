<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipanteExterno extends Model
{
    protected $table = 'participanteexterno';
    //Primario
    public $primaryKey = 'idParticipanteExterno';

    public $timestamps = false;
}
