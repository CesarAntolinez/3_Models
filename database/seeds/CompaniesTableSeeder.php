<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'nit'        => 123456789,
            'direccion'  => Str::random(10),
            'nombre'     => Str::random(10),
        ]);
        DB::table('companies')->insert([
            'nit'        => 321654987,
            'direccion'  => Str::random(10),
            'nombre'     => Str::random(10),
        ]);
        DB::table('companies')->insert([
            'nit'        => 369852147,
            'direccion'  => Str::random(10),
            'nombre'     => Str::random(10),
        ]);
    }
}
