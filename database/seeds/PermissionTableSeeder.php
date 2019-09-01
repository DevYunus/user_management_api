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
                'slug' => "Add User",
                'group' => "users",
                'description' => "Has Ability to Add Users"
            ],
            [
                'name' => "list_user",
                'slug' => "List User",
                'group' => "users",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic"
            ],
            [
                'name' => "view_user",
                'slug' => "View User",
                'group' => "users",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic"
            ],
            [
                'name' => "delete_user",
                'slug' => "Delete User",
                'group' => "users",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic"
            ],
            [
                'name' => "edit_user",
                'slug' => "Edit User",
                'group' => "users",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic"
            ],
            [
                'name' => "add_role",
                'slug' => "Add role",
                'group' => "roles",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic"
            ],
            [
                'name' => "Dummy Permission",
                'slug' => "custom_permission",
                'group' => "Custom",
                'description' => "Lorem ipsum is placeholder text commonly used in the graphic"
            ],
        ];
        DB::table('permissions')->insert($permissions);

        $role = Role::whereName('admin')->first();
        $role->permissions()->sync(Permission::all());
    }
}
