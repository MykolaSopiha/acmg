<?php

namespace App\Console\Commands;

use App\Account;
use App\PaymentType;
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
        $accounts = Account::getConfirmedAccounts();

        foreach ($accounts as $account) {

            $sessions = Session::where([
                ['account_id', $account->id],
                ['created_at', '>=', Carbon::now()->subDay()]
            ])->get();


        }
    }
}
