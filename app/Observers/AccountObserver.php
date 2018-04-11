<?php

namespace App\Observers;

use App\Timetable;
use Auth;
use App\User;
use App\Account;
use App\Notifications\AccountAdded;
use Illuminate\Support\Facades\Artisan;

class AccountObserver
{
    public function created(Account $account)
    {
        $admins = User::getAdmins();
        $user = Auth::user();
        \Notification::send($admins, new AccountAdded($user, $account));

        $data = [
            'account_id' => $account->id,
            'time' => null,
            'days' => 0b1111111, // days of week
        ];

        $schedule = new Timetable();
        $schedule->fill($data);
        $schedule->save();

        $data = [
            'account_id' => $account->id,
            'time' => null,
            'days' => 0b1111111
        ];

        $schedule = new Timetable();
        $schedule->fill($data);
        $schedule->save();
    }

    public function updating(Account $account)
    {
        $new_account = $account->getDirty();

        Artisan::call('update:hourly');
    }
}
