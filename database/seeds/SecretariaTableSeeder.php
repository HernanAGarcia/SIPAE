<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecretariaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secretaria')->insert([
            'nombre' => 'Secretaria de Armenia',
            
        ]);


        DB::table('users')->insert([
            'nombre_Usuario' => 'Secretaria de Armenia',
            'email' => 'secretaria@gmail.com',
            'password' => bcrypt('secret'),
            
        ]);
    }
}