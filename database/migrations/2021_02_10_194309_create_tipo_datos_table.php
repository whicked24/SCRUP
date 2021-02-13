<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_datos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->string('url',100)->default('home')->nullable();
            $table->boolean('menu')->default(true)->nullable();
            $table->integer('fkestatus')->default(1)->nullable();
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
        Schema::dropIfExists('tipo_datos');
    }
}
