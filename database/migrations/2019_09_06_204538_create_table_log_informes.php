<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTableLogInformes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('log_informes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_archivo');
            $table->string('ruta');
            $table->date('fecha_creacion');
            $table->integer('id_tipo')->unsigned()->index();
            $table->foreign('id_tipo')->references('id')->on('tipo_informe');
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
        Schema::drop('informes');
    }
}
