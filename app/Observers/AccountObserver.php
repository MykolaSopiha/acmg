<?php

namespace App\Observers;

use App\Timetable;
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

        $data = [
            'account_id' => $account->id,
            'time' => null,
            'days' => 0b1111111, // days of week
            'earliest_time' => config('accounts.sessions.first.start'),
            'latest_time' => config('accounts.sessions.first.end'),
        ];

        $schedule = new Timetable();
        $schedule->fill($data);
        $schedule->save();

        $data = [
            'account_id' => $account->id,
            'time' => null,
            'days' => 0b1111111,
            'earliest_time' => config('accounts.sessions.second.start'),
            'latest_time' => config('accounts.sessions.second.end'),
        ];

        $schedule = new Timetable();
        $schedule->fill($data);
        $schedule->save();
    }
}
