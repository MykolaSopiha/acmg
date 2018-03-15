<?php

namespace App\Http\Controllers\Admin;

use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::all();
        return view('admin.withdraws.index', compact('withdraws'));
    }

    public function view($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        return view('admin.withdraws.view', compact('withdraw'));
    }

    public function confirm($id)
    {
        $withdraw = Withdraw::findOrFail($id)->confirm();

        return back()->with(['success' => 'Withdraw confirmed!']);
    }
}
