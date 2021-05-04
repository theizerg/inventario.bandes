<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposConsumiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_consumibles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_equipo_consumible');
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
        Schema::dropIfExists('equipos_consumibles');
    }
}
