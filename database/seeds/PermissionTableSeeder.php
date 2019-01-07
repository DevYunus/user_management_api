<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5000; $i++) {
            $permission[] = [
                'name' => "permission$i"
            ];
        }

        DB::table('permissions')->insert($permission);
    }
}
