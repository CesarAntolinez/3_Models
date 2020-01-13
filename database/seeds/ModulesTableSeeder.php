<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'nombre'    => "Empresa",
            'ruta'      => "company",
        ]);
        DB::table('modules')->insert([
            'nombre'    => "Usuario",
            'ruta'      => "user",
        ]);
        DB::table('modules')->insert([
            'nombre'    => "Roles",
            'ruta'      => "role",
        ]);
        DB::table('modules')->insert([
            'nombre'    => "Modulos",
            'ruta'      => "module",
        ]);
    }
}
