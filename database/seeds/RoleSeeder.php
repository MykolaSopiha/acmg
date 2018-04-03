<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $role) {
            $item = new Role();
            $item->name = $role;
            $item->save();
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'admin',
            'manager',
            'user',
        ];
    }
}
