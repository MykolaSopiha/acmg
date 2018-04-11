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
        $user->timezone = 'Europe/Kiev';
        $user->country_id = 1; // Ukraine ID = 1
        $user->referer_key = str_random(10);
        $user->save();


        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $userRole = Role::where('name', 'user')->first();

        $user->attachRole($adminRole);
        $user->attachRole($userRole);



        $user = new User();
        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('123123');
        $user->phone = '+380967368181';
        $user->timezone = 'Europe/Kiev';
        $user->country_id = 1; // Ukraine ID = 1
        $user->referer_key = str_random(10);
        $user->save();

        $user->attachRole($userRole);

        $user = new User();
        $user->name = 'manager';
        $user->email = 'manager@gmail.com';
        $user->password = Hash::make('123123');
        $user->phone = '+380967368182';
        $user->timezone = 'Europe/Kiev';
        $user->country_id = 1; // Ukraine ID = 1
        $user->referer_key = str_random(10);
        $user->save();

        $user->attachRole($managerRole);
        $user->attachRole($userRole);
    }
}
