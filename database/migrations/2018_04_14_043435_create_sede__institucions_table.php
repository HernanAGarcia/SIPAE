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
        Schema::create('Sede__Institucion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('Id_Institucion')->unsigned();
            $table->foreign('Id_Institucion')->references('id')->on('Institucion');
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
