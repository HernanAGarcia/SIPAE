<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedeInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sede_Institucion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('rector');
            $table->integer('codigo');
            $table->string('email');
            $table->string('direccion');
            $table->string('telefono');
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
        Schema::dropIfExists('sede__institucions');
    }
}
