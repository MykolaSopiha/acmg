<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->countries() as $country) {

            $countryEntity = new Country();
            $countryEntity->name = $country['country_name'];
            $countryEntity->code = $country['country_code'];
            $countryEntity->phone = $country['dialling_code'];
            $countryEntity->save();
        }
    }

    public function countries()
    {
        return [
            [
                "country_code" => "UA",
                "country_name" => "Ukraine",
                "dialling_code" => "+380"
            ],
            [
                "country_code" => "RU",
                "country_name" => "Russia",
                "dialling_code" => "+7"
            ],
            [
                "country_code" => "BY",
                "country_name" => "Belarus",
                "dialling_code" => "+375"
            ],
            [
                "country_code" => "KZ",
                "country_name" => "Kazakhstan",
                "dialling_code" => "+7"
            ]
        ];
    }
}
