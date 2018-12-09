<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionalEvento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEvento')->unsigned();
            $table->integer('idProfesional')->unsigned();
            $table->boolean('encargado');

            $table->foreign('idEvento')
            ->references('idEvento')
            ->on('evento')
            ->onDelete('cascade');

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
        Schema::dropIfExists('profesionalEvento');
    }
}
