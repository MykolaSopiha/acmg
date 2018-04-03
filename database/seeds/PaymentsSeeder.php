<?php

use App\Payment;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $data) {

            $payment = new Payment();
            $params = [
                'country_id' => $data['country_id'],
                'amount' => $data['amount'],
                'payment_type_id' => $data['payment_type_id'],
            ];
            $payment->fill($params);
            $payment->save();

        }
    }

    public function getData()
    {
        return [
            [
                "country_id" => 1,
                "amount" => 100, // 100.00 UAH
                "payment_type_id" => 1,
            ],
            [
                "country_id" => 1,
                "amount" => 50, // 50.00 UAH
                "payment_type_id" => 2,
            ],
            [
                "country_id" => 1,
                "amount" => 20, // 20.00 UAH
                "payment_type_id" => 3,
            ],
        ];
    }
}
