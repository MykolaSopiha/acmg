<?php

namespace App\Http\Controllers\Cabinet;

use App\Account;
use App\Payment;
use App\Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $accounts = Account::all()->count();
        $sessions = Session::all()->count();
        $balance = 0;
        $referals = 0;
        return view('cabinet.dashboard', compact('accounts', 'sessions', 'balance', 'referals'));
    }
}
