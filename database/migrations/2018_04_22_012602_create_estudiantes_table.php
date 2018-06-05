<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('documento');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('grado');
            $table->boolean('titular');
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
        Schema::dropIfExists('estudiante');
    }
}
