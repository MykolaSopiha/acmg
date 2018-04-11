<?php

namespace App\Observers;

use App\Deposit;
use App\PaymentType;
use App\Session;

class SessionObserver
{
    public function updating(Session $session)
    {
        if (
            $session->status == 'success' &&
            $session['original']['status'] != 'success' &&
            $session->account->isConfirmed()
        ) {
            $payment_type = PaymentType::where('label', 'session')->first(); // referal account confirmation
            $payment = $payment_type->payment->where('country_id', $session->account->user->country_id)->first();

            $deposit = new Deposit();
            $deposit->fill([
                'wallet_id' => $session->account->user->wallet->id,
                'amount' => $payment['amount'],
                'payment_type_id' => 3,
                'account_id' => $session->id,
                'available' => false,
            ]);
            $deposit->save();
            $deposit->makeAvailable();
        }
    }
}
