<?php

namespace App\Http\Controllers\Manager;

use Auth;
use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $accounts = Account::where('manager_id', Auth::user()->id)->paginate(10);
        return view('manager.dashboard', compact('accounts', 'rowCounts'));
    }
}
