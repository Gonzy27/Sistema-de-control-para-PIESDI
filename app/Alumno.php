<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    //Primario
    public $primaryKey = 'idAlumno';

    public $timestamps = false;

    public function evento(){
        return $this->belongsToMany(Evento::class,'alumnoevento','idAlumno','idEvento')->withPivot('encargado');
    }
}
