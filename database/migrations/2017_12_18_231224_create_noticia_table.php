<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
            $table->increments('idNoticia');
            $table->string('asunto');
            $table->string('para');
            $table->string('introducción');
            $table->string('descripcion');
            $table->integer('idEvento')->unsigned();

            $table->foreign('idEvento')
            ->references('idEvento')
            ->on('evento')
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
        Schema::dropIfExists('noticia');
    }
}
