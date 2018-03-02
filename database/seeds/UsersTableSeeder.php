<?php

use App\Role;
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
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123123');
        $user->phone = '+380967368180';
        $user->country_id = 3;
        $user->referer_key = str_random(10);
        $user->save();
        $user->initWallet();


        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $user->attachRole($adminRole);
        $user->attachRole($userRole);

        $user = new User();
        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('123123');
        $user->phone = '+380967368180';
        $user->country_id = 3;
        $user->referer_key = str_random(10);
        $user->save();
        $user->initWallet();

        $user->attachRole($userRole);
    }
}
