<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profesional extends Authenticatable
{
    use Notifiable;

    //Nombre tabla
    protected $table = 'profesional';
    //Primario
    public $primaryKey = 'idProfesional';

    public $timestamps = false;

    protected $fillable = [
        'rut', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'telefono', 'celular', 'cargo', 'correo',
    ];

    protected $hidden = [
        'contrasenia', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->contrasenia;
    }

    public function getEmailForPasswordReset()
    {
        return $this->correo;
    }

    public function evento(){
        return $this->belongsToMany(Evento::class,'profesionalEvento','idProfesional','idEvento');
    }

    public function solicitud(){
        return $this->hasMany(Solicitud::class,'idProfesional','idProfesional');
    }
}
