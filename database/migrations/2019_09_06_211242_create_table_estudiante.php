<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTableEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Estudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('grado');
            $table->boolean('titular_derecho');
            $table->integer('id_institucion')->unsigned()->index();
            $table->foreign('id_institucion')->references('id')->on('sede_institucion');
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
        //
    }
}
