<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJornadaHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jornada_historicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkidjornada');
            $table->integer('cedula');
            $table->text('asunto');
            $table->text('descripcion')->nullable();
            $table->integer('fktipo_jornada');
            $table->integer('fktipo_beneficiario');
            $table->dateTime('fecha_inicio', 0);
            $table->dateTime('fecha_fin', 0)->nullable();
            $table->string('tiempo_estimado',20)->nullable();
            $table->integer('fkestatus');
            $table->integer('fkid_sector');
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
        Schema::dropIfExists('jornada_historicos');
    }
}
