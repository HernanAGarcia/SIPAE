<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_asistencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_Archivo');
            $table->string('ruta');
            $table->string('fecha');
            $table->integer('Id_Sede_Institucion')->unsigned();
            $table->foreign('Id_Sede_Institucion')->references('id')->on('sede_institucion');
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
        Schema::dropIfExists('informe__asistencia');
    }
}
