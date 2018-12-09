<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaAlumno extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'alumno_demo';

    public $primaryKey = 'id_alumno';
}
