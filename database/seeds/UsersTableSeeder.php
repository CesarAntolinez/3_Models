<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('users')->insert([
           'cedula'     => Str::random(10),
           'nombre'     => Str::random(10),
           'telefono'   => 123456789,
           'correo'     => Str::random(10).'@gmail.com',
           'password'   => bcrypt('password'),
       ]);
       DB::table('users')->insert([
           'cedula'     => Str::random(10),
           'nombre'     => Str::random(10),
           'telefono'   => 321654987,
           'correo'     => Str::random(10).'@gmail.com',
           'password'   => bcrypt('password'),
       ]);
       DB::table('users')->insert([
           'cedula'     => Str::random(10),
           'nombre'     => Str::random(10),
           'telefono'   => 369852147,
           'correo'     => Str::random(10).'@gmail.com',
           'password'   => bcrypt('password'),
       ]);
    }
}
