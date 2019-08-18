<?php

use App\Models\Role;
use App\Models\Permission;
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
        $permissions = [
            [
                'name' => "add_user",
                'group' => "Users",
                'description' => "Has Ability to Add Users"
            ],
            [
                'name' => "list_user",
                'group' => "Users",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic, print"
            ],
            [
                'name' => "view_user",
                'group' => "Users",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic, print"
            ],
            [
                'name' => "delete_user",
                'group' => "Users",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic, print"
            ],
            [
                'name' => "edit_user",
                'group' => "Users",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic, print"
            ],
        ];
        DB::table('permissions')->insert($permissions);

        $role = Role::whereName('admin')->first();
        $role->permissions()->sync(Permission::all());
    }
}
