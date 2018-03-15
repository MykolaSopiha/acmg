<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Payment;
use App\Session;
use App\User;
use App\Withdraw;
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
}
