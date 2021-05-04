<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_equipo_id')->unsigned();
            $table->foreign('tipo_equipo_id')->references('id')->on('tipo_equipos');
            $table->string('nb_marca');
            $table->string('nb_modelo');
            $table->string('serial');
            $table->string('nu_cantidad');
            $table->integer('status')->unsigned();
            //$table->foreign('estado_id')->references('id')->on('estados');
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
        Schema::dropIfExists('equipos');
    }
}
