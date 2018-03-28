<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Account;
use App\Session;
use App\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $accounts = Account::all()->count();
        $sessions = Session::all()->count();
        $users = User::all()->count();
        $withdraws = Withdraw::all()->count();
        return view('admin.dashboard', compact('accounts', 'sessions', 'users', 'withdraws'));
    }

    public function accountChart()
    {
        $accountsPerDay = Account::select('id', 'created_at')
            ->where('created_at', '>', Carbon::now()->subDays(7))
            ->withTrashed()
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by years
                //return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });


        $result = [];
        foreach ($accountsPerDay as $day => $accounts) {
            $result[] = [
                $day => $accounts->count(),
            ];
        }

        return response($result);
    }
}
