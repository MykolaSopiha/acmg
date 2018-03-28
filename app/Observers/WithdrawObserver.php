<?php

namespace App\Observers;

use App\User;
use App\Withdraw;
use App\Notifications\WithdrawRequested;

class WithdrawObserver
{

    public function created(Withdraw $withdraw)
    {
        $admins = User::getAdmins();

        \Notification::send($admins, new WithdrawRequested($withdraw));
    }

}
