<?php

use Illuminate\Database\Seeder;
use App\Model\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=[
        		['name'=>'admin','email'=>'admin@niptict.com','password'=>bcrypt('111111'),'url_image'=>'profile/V0YqCsCMKzLGaoF8a3WmrwK5dKgcIdb37FcIqIea.png','is_super_admin'=>'1'],

        		['name'=>'user','email'=>'user@niptict.com','password'=>bcrypt('111111'),'url_image'=>'profile/V0YqCsCMKzLGaoF8a3WmrwK5dKgcIdb37FcIqIea.png','is_super_admin'=>'0']
        	];
        	foreach ($arr as $user) {
        		User::create($user);
        	}
    }
}
