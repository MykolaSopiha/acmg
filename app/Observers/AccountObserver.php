<?php

namespace App\Observers;

use Auth;
use App\User;
use App\Account;
use App\Notifications\AccountAdded;

class AccountObserver
{
    public function created(Account $account)
    {
        $admins = User::getAdmins();

        $user = Auth::user();

        \Notification::send($admins, new AccountAdded($user, $account));
    }
}
