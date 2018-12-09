<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExternoEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('externoevento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEvento')->unsigned();
            $table->integer('idParticipanteExterno')->unsigned();
            $table->boolean('encargado');

            $table->foreign('idEvento')
            ->references('idEvento')
            ->on('evento')
            ->onDelete('cascade');

            $table->foreign('idParticipanteExterno')
            ->references('idParticipanteExterno')
            ->on('participanteexterno')
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
        Schema::dropIfExists('externoevento');
    }
}
