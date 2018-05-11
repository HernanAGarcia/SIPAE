<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('secretaria')->insert([
          //  'nombre' => 'Secretaria de Armenia',
        //]);

        DB::table('sede_institucion')->insert([
            'nombre' => 'Instituto Montenegro',
            'rector' => 'JOSE URIEL GONZALEZ RAMIREZ',
            'codigo' => '163470000291',
            'nit'=> '163470000291',
            'email' => 'insmontenegro@hotmail.com',
            'direccion' =>'Carrera 5 #11-07 - Montenegro',
            'telefono'=>'7535600'
        ]);

         DB::table('users')->insert([
             'nombre_Usuario' => 'Secretaria de Armenia',
             'email' => 'secretaria@gmail.com',
             'password' => bcrypt('secret'),
             'role'=>'secretaria',
             'Id_Sede_Institucion'=>'1',
             'Id_Secretaria'=>'1',
         ]);
    }
}
