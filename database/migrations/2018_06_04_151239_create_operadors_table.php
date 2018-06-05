<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('nit')->unique();
            $table->string('email');
            $table->string('direccion');
            $table->string('telefono');
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
        Schema::dropIfExists('operador');
    }
}
