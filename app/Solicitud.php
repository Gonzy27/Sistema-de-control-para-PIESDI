<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';

    public $primaryKey = 'idSolicitud';

    public $timestamps = false;


    public function profesional()
    {
        return $this->belongsTo(Profesional::class,'idProfesional','idProfesional');
    }
}
