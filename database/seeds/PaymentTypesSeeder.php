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
                "name" => "Account confirmation",
                "description" => "Account has been tested and is suitable for use.",
                "label" => "valid",
            ],
            [
                "name" => "Referral account",
                "description" => "Payment for passing the check of the referral account",
                "label" => "referal",
            ],
            [
                "name" => "Payment per session",
                "description" => "One-time payment for each successful session.",
                "label" => "session",
            ],
        ];
    }
}
