<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnoEvento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEvento')->unsigned();
            $table->integer('idAlumno')->unsigned();
            $table->boolean('encargado');

            $table->foreign('idEvento')
            ->references('idEvento')
            ->on('evento')
            ->onDelete('cascade');

            $table->foreign('idAlumno')
            ->references('idAlumno')
            ->on('alumno')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnoEvento');
    }
}
