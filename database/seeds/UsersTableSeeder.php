<?php

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Yunus',
            'last_name' => 'shaikh',
            'phone' => '+918788201676',
            'starred_at' => Carbon::now(),
            'email' => 'yunus@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $role = Role::whereName('admin')->first();
        $user->roles()->sync($role);
    }
}
