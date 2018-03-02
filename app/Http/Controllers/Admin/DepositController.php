<?php

namespace App\Http\Controllers\Admin;

use App\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::all();
        return view('admin.deposits.index', compact('deposits'));
    }
}
