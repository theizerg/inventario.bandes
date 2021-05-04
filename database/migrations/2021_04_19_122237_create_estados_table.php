<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nb_status', 20)->unique();
            $table->string('nb_secundario', 20);
            $table->string('co_status', 6)->nullable();
            $table->string('co_grupo', 10)->nullable();
            $table->string('tx_icono', 30)->nullable();
            $table->string('tx_color', 30)->nullable();
            $table->integer('id_padre')->nullable();
            $table->string('tx_observaciones', 200)->nullable();
            $table->boolean('bo_activo');
            $table->integer('id_usuario');
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
        Schema::dropIfExists('estados');
    }
}
