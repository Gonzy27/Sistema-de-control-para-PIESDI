<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    //Primario
    public $primaryKey = 'idEvento';

    public $timestamps = false;

    public function profesional(){
        return $this->belongsToMany(Profesional::class,'profesionalevento','idEvento','idProfesional')->withPivot('encargado');
    }

    public function alumno(){
        return $this->belongsToMany(Alumno::class,'alumnoevento','idEvento','idAlumno')->withPivot('encargado');
    }

    public function externo(){
        return $this->belongsToMany(ParticipanteExterno::class,'externoevento','idEvento','idParticipanteExterno')->withPivot('encargado');
    }
}
