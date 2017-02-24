<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->increments('id');
            /*$table->integer('idcargo')->unsigned();
            $table->foreign('idcargo')->references('id')->on('cargo');*/
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->string('estatus');
            $table->integer('idcargo')->unsigned();
            $table->foreign('idcargo')->references('id')->on('cargo');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajador');

    }
}
