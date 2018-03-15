<?php

use Illuminate\Database\Seeder;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $pt) {

            $paymentType = new \App\PaymentType();
            $paymentType->name = $pt['name'];
            $paymentType->description = $pt['description'];
            $paymentType->label = $pt['label'];
            $paymentType->save();

        }
    }

    public function getData()
    {
        return [
            [
                "name" => "Account confirmed",
                "description" => "Account has been tested and is suitable for use",
                "label" => "valid",
            ],
            [
                "name" => "Weekly payout",
                "description" => "Weekly payment for the account that has been tested for suitability for use for promotional purposes",
                "label" => "week",
            ],
            [
                "name" => "Referral account",
                "description" => "Payment for passing the check of the referral account",
                "label" => "ref",
            ],
        ];
    }
}
