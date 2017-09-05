<?php

use App\User;
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
    	DB::table('users')->delete();
    	
    	$user = new User();
    	$user->name = "Admin";
    	$user->email = "ekprogs@gmail.com";
    	$user->password = bcrypt("mighty17");
    	$user->role_id = 2;
    	$user->phone = "08161627739";
    	$user->save();

        $user2 = new User();
        $user2->name = "Admin";
        $user2->email = "daniel@mighty.com.ng";
        $user2->password = bcrypt("123456");
        $user2->role_id = 2;
        $user2->phone = "02000336699";
        $user2->save();
    }
}
