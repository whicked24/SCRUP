<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoJornadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_jornadas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->integer('fkestatus')->default(1);
            $table->foreign('fkestatus')->references('id')->on('estatus');
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
        Schema::dropIfExists('tipo_jornadas');
    }
}
