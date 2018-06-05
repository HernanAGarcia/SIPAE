<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeCoberturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_cobertura', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_Archivo');
            $table->string('ruta');
            $table->string('fecha');
            $table->integer('codigo_Institucion');
            $table->integer('Id_Secretaria')->unsigned();
            $table->foreign('Id_Secretaria')->references('id')->on('secretaria');
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
        Schema::dropIfExists('informe_cobertura');
    }
}
