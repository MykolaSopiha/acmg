<?php

namespace App\Providers;

use App\User;
use App\Account;
use App\Withdraw;
use App\Observers\UserObserver;
use App\Observers\AccountObserver;
use App\Observers\WithdrawObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Account::observe(AccountObserver::class);
        Withdraw::observe(WithdrawObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
