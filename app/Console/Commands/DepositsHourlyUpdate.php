<?php

namespace App\Console\Commands;

use App\Account;
use App\PaymentType;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DepositsHourlyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hourly:deposit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Here we check if some user deserves week payment for confirmed account';

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
        $confirmedAccounts = Account::getConfirmedAccounts();

        $weekPaymentType = PaymentType::where('label', 'week')->first();
        $accountConfirmType = PaymentType::where('label', 'valid')->first();

        foreach ($confirmedAccounts as $account) {
            if ($account->deposit()->count() > 0) {
                $lastDeposit = $account->deposit()
                    ->where('available', true)
                    ->whereIn('payment_type_id', [
                        $weekPaymentType['id'],
                        $accountConfirmType['id'],
                    ])->get()->sortBy('id')->last();

                if (($lastDeposit['created_at'] < Carbon::now()->subDays(7))) {
                    $account->depositWeekPayment();
                }
            }
        }
    }
}
