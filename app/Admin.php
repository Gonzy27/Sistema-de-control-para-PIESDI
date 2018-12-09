<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    //Nombre tabla
    protected $table = 'profesional';
    //Primario
    public $primaryKey = 'idProfesional';
    
    public $timestamps = false;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rut', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'telefono', 'celular', 'cargo', 'correo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function evento(){
        return $this->belongsToMany(Evento::class,'profesionalEvento','idProfesional','idEvento');
    }

    public function solicitud(){
        return $this->hasMany(Solicitud::class,'idProfesional','idProfesional');
    }
}
