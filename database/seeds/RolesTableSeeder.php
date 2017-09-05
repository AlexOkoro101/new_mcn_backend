<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->delete();

        $user = new Role();
        $user->name = "User";
        $user->save();

        $admin = new Role();
        $admin->name = "Administrator";
        $admin->save();
    }
}
