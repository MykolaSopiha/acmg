<?php

namespace App\Http\Controllers\Admin;

use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::all();
        return view('admin.withdraws.index', compact('withdraws'));
    }
}
