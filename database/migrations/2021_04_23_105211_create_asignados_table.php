<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha')->default(date('d/m/Y'));
            $table->string('serial_bandes');
            $table->string('descripcion');
            $table->integer('equipo_id')->unsigned();
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->string('nb_funcionario');
            $table->string('nb_gerencia')->unsigned();
            $table->string('nb_unidad_administrativa');
            $table->string('nu_piso');
            $table->string('nu_extension');
            $table->string('status');
            $table->string('nb_especialista_soporte'); 
            $table->integer('nu_cantidad');
            $table->integer('nu_tipo_asignado'); 
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
        Schema::dropIfExists('asignados');
    }
}
