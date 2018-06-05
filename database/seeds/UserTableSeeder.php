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
        DB::table('secretaria')->insert([
            'nit'=> '1000',
            'nombre' => 'Secretaria de Armenia',
            'direccion' =>'Carrera 1 # 1 Armenia',
            'telefono'=>'7535600',
            'email' => 'secretaria@gmail.com'
        ]);

        DB::table('sede_institucion')->insert([
             'nombre' => 'Instituto Montenegro',
             'rector' => 'JOSE URIEL GONZALEZ RAMIREZ',
             'codigo' => '16347291',
             'nit'=> '163',
             'email' => 'insmontenegro@hotmail.com',
             'direccion' =>'Carrera 5 #11-07 - Montenegro',
             'telefono'=>'7535600'
         ]);

         // DB::table('operador')->insert([
         //      'nombre' => 'Operador',
         //      'nit'=> '361',
         //      'direccion' =>'Carrera 5 #11-07 - Armenia',
         //      'telefono'=>'7535600',
         //      'email' => 'insmontenegro@hotmail.com',
         //      'Id_Secretaria'=>'1'
         //  ]);
         // 
          DB::table('users')->insert([
              'nombre_Usuario' => 'Secretaria de Armenia',
              'email' => 'secretaria@gmail.com',
              'password' => bcrypt('secret'),
              'role'=>'secretaria',
              'Id_Sede_Institucion'=>'1',
              'Id_Secretaria'=>'1',
          ]);

         DB::table('users')->insert([
           'nombre_Usuario' => 'Instituto Montenegro',
             'email' => 'montenegro@gmail.com',
             'password' => bcrypt('secret'),
             'role'=>'institucion',
             'Id_Sede_Institucion'=>'1',
             'Id_Secretaria'=>'1',
         ]);
        //
        // DB::table('users')->insert([
        //      'nombre_Usuario' => 'Operador',
        //      'email' => 'operador@gmail.com',
        //      'password' => bcrypt('secret'),
        //      'role'=>'operador',
        //      'Id_operador'=>'1',
        //      'Id_Sede_Institucion'=>'1',
        //      'Id_Secretaria'=>'1',
        //  ]);
    }
}
