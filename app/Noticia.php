<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = 'noticia';
    
    public $primaryKey = 'idNoticia';
    
    public $timestamps = false;

    public function evento(){
        return $this->belongsTo(Evento::class,'idEvento','idEvento');
    }
}
