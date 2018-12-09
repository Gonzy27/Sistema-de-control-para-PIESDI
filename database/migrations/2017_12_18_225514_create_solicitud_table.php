<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->increments('idSolicitud');
            $table->string('asunto');
            $table->string('nombreEmisor');
            $table->string('cargoEmisor');
            $table->string('correoEmisor');
            $table->string('correoDestinatario');
            $table->string('mensaje');
            $table->integer('idProfesional')->unsigned();

            $table->foreign('idProfesional')
            ->references('idProfesional')
            ->on('profesional')
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
        Schema::dropIfExists('solicitud');
    }
}
