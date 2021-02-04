<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataMaestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_maestra', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',32);
            $table->string('nombre',32);
            $table->string('codigo',32);
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
        Schema::dropIfExists('data_maestras');
    }
}
