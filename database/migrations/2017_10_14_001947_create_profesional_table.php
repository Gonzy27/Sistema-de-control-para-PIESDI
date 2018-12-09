<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voids
     */
    public function up()
    {
        Schema::create('profesional', function (Blueprint $table) {
            $table->increments('idProfesional');
            $table->string('rut');
            $table->string('nombre');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('direccion');
            $table->string('correo')->unique();
            $table->string('telefono');
            $table->string('celular');
            $table->string('cargo');
            $table->boolean('tipoCuenta');
            $table->string('contrasenia');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesional');
    }
}
