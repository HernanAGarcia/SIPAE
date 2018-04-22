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
            $table->string('nombreArchivo');
            $table->string('ruta');
            $table->Date('fecha');
            $table->integer('Id_Sede_Institucion')->unsigned();
            $table->foreign('Id_Sede_Institucion')->references('id')->on('Sede_Institucion');
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
        Schema::dropIfExists('informe__asistencias');
    }
}
