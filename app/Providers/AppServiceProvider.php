<?php

namespace App\Providers;

use App\User;
use App\Account;
use App\Session;
use App\Withdraw;
use App\Observers\UserObserver;
use App\Observers\AccountObserver;
use App\Observers\SessionObserver;
use App\Observers\WithdrawObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        User::observe(UserObserver::class);
        Account::observe(AccountObserver::class);
        Withdraw::observe(WithdrawObserver::class);
        Session::observe(SessionObserver::class);
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
