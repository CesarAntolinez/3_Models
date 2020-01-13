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
            'direccion'  => "Calle 1",
            'nombre'     => "Empresa 1",
        ]);
        DB::table('companies')->insert([
            'nit'        => 321654987,
            'direccion'  => "Calle 2",
            'nombre'     => "Empresa 2",
        ]);
        DB::table('companies')->insert([
            'nit'        => 369852147,
            'direccion'  => "Calle 3",
            'nombre'     => "Empresa 3",
        ]);
    }
}
