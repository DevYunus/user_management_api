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
        $roles = [
            [
                'name' => "admin",
                'description' => "Admin can access whole application and has access to every module"
            ],
            [
                'name' => "normal-user",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic, print"
            ],
            [
                'name' => "custom",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic, print"
            ],
        ];
        DB::table('roles')->insert($roles);
    }
}
