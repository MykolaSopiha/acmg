<?php

namespace App\Http\Controllers\User;

use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::where('wallet_id', Auth::user()->wallet->id)->get();
        return view('cabinet.withdraws.index', compact('withdraws'));
    }

    public function create()
    {
        return view('cabinet.withdraws.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->wallet->locked == true){
            return back()->with(['error' => 'Your wallet is locked!']);
        }

        $walletBalance = Auth::user()->wallet->balance;

        $minWithdraw = config('accounts.min_withdraw.' . Auth::user()->country->code);

        $this->validate($request, [
            'amount' => 'required|numeric|max:' . $walletBalance . (($minWithdraw) ? "|min:" . $minWithdraw : ""),
            'card_number' => 'required|numeric|digits:16',
        ], [
            'max' => 'Вы можете заказать снятие средств на сумму не большье ' . $walletBalance . ' ' . Auth::user()->wallet->currency->code . '.',
            'min' => 'Вы можете заказать снятие средств на сумму не меньше ' . $minWithdraw . ' ' . Auth::user()->wallet->currency->code . '.',
        ]);


        $withdraw = new Withdraw();
        $withdraw->fill([
            'wallet_id' => Auth::user()->wallet->id,
            'amount' => $request['amount'],
            'card_code' => $request['card_number'],
            'status' => 0,
        ]);
        $withdraw->save();

        return back()->with(['success' => 'Withdraw saved!']);
    }
}
