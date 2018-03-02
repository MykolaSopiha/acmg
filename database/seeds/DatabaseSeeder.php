<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CurrenciesSeeder::class);
        $this->call(PaymentTypesSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
