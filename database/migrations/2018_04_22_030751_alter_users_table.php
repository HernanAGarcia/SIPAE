<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->integer('Id_Sede_Institucion')->unsigned();
          $table->foreign('Id_Sede_Institucion')->references('id')->on('Sede_Institucion');
          $table->integer('Id_Secretaria')->unsigned();
          $table->foreign('Id_Secretaria')->references('id')->on('Secretaria');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('Id_Sede_Institucion')->unsigned();
          $table->dropColumn('Id_Secretaria')->unsigned();//
        });
    }
}
