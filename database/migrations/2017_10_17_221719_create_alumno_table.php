<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('idAlumno');
            $table->string('rut');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('direccion');
            $table->string('correo');
            $table->string('celular');
            $table->string('carrera');
            $table->integer('anioIngreso');
            $table->string('situacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
