<?php

namespace App\Http\Controllers\User;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $accounts = Account::where('user_id', Auth::user()->id)->count();
        $referals = Auth::user()->getReferals()->count();
        $withdraw = Auth::user()->wallet->getWithdrawnMoney();
        $balance = Auth::user()->wallet->getBalanceMoney();
        return view('cabinet.dashboard', compact('accounts', 'withdraw', 'balance', 'referals'));
    }
}
