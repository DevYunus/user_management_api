<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5000; $i++) {
            $role[] = [
                'name' => "role$i"
            ];
        }

        DB::table('roles')->insert($role);
    }
}
