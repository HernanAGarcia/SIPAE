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
       //  DB::table('secretaria')->insert([
       //      'nombre' => 'Secretaria de Armenia',
       //  ]);

       //  DB::table('sede_institucion')->insert([
       //       'nombre' => 'Instituto Montenegro',
       //       'rector' => 'JOSE URIEL GONZALEZ RAMIREZ',
       //       'codigo' => '163470000291',
       //       'nit'=> '163',
       //       'email' => 'insmontenegro@hotmail.com',
       //       'direccion' =>'Carrera 5 #11-07 - Montenegro',
       //       'telefono'=>'7535600'
       //   ]);

          DB::table('users')->insert([
        
              'email' => 'secretaria@gmail.com',
              'password' => bcrypt('secret'),
              'role'=>'secretaria'
          ]);

        //  DB::table('users')->insert([
       //     'nombre_Usuario' => 'Instituto Montenegro',
       //       'email' => 'montenegro@gmail.com',
       //       'password' => bcrypt('secret'),
       //       'role'=>'institucion',
       //       'Id_Sede_Institucion'=>'1',
       //       'Id_Secretaria'=>'1',
       //   ]);

        // DB::table('users')->insert([
         //     'nombre_Usuario' => 'Operador',
         //     'email' => 'operador@gmail.com',
         //     'password' => bcrypt('secret'),
         //     'role'=>'operador',
         //     'Id_Sede_Institucion'=>'1',
         //     'Id_Secretaria'=>'1',
         // ]);
    }
}
