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
            'nombre'    => Str::random(10),
            'ruta'      => Str::random(10),
        ]);
        DB::table('modules')->insert([
            'nombre'    => Str::random(10),
            'ruta'      => Str::random(10),
        ]);
        DB::table('modules')->insert([
            'nombre'    => Str::random(10),
            'ruta'      => Str::random(10),
        ]);
    }
}
