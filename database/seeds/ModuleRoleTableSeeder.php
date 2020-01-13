<?php

use Illuminate\Database\Seeder;

class ModuleRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_role')->insert([
           'role_id'     => 1,
           'module_id'     => 1,
       ]);
       DB::table('model_role')->insert([
           'role_id'     => 1,
           'module_id'     => 2,
       ]);
       DB::table('model_role')->insert([
           'role_id'     => 1,
           'module_id'     => 3,
       ]);
       DB::table('model_role')->insert([
           'role_id'     => 1,
           'module_id'     => 4,
       ]);
    }
}
