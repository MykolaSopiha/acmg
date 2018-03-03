<?php

namespace App\Observers;

use App\Notifications\NewUser;
use App\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->createWallet();

        $admins = User::getAdmins();

        \Notification::send($admins, new NewUser($user));
    }
}
