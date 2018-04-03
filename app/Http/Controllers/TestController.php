<?php

namespace App\Http\Controllers;

use App\Account;
use App\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {

        $accounts = Account::getConfirmedManagedAccounts();

        foreach ($accounts as $account) {

            $sessions = Session::where([
                ['account_id', $account->id],
                ['created_at', '>=', Carbon::now()->subHours(24)]
            ])->get();

            $timetables = $account->timetable()->get();

            if ($sessions->count() == 0 && $timetables->count() > 0) {
                foreach ($timetables as $timetable) {
                    $session = new Session();
                    $session->fill([
                        'account_id' => $account->id,
                        'manager_id' => $account->manager_id,
                        'timetable_id' => $timetable->id,
                        'comment' => null,
                    ]);
                    $session->save();
                }
            }

        }


        $trashSessions = Session::where([
            ['created_at', '<', Carbon::now()->subHours(24)],
            ['status', 'expect'],
        ])->update(['status' => 'trash']);



        $expectedSessions = Session::where('status', 'expect')->get();
        foreach ($expectedSessions as $session) {
            if ($session->timetable->isMissed()) {
                $session->update(['status' => 'trash']);
            }
        }

    }
}
