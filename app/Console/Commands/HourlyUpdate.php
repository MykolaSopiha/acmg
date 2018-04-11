<?php

namespace App\Console\Commands;

use App\Account;
use App\Session;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HourlyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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

        echo 'hi1';

        $trashSessions = Session::where([
            ['created_at', '<', Carbon::now()->subHours(24)],
            ['status', 'expect'],
        ])->update(['status' => 'trash']);

        echo 'hi2';

        $expectedSessions = Session::where('status', 'expect')->get();
        foreach ($expectedSessions as $session) {
            if ($session->timetable->created_at < Carbon::now()->subDays(1)) {
                $session->update(['status' => 'trash']);
            }
        }

        echo 'hi3';
    }
}
