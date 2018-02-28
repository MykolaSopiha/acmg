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
        $users = User::all()->count();
        $payments = Payment::all()->count();
        return view('admin.dashboard', compact('accounts', 'sessions', 'users', 'payments'));
    }
}
