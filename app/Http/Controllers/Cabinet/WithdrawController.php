<?php

namespace App\Http\Controllers\Cabinet;

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
        $this->validate($request, [
            'amount' => 'required|numeric|min:1',
            'card_number' => 'required|numeric|digits:16',
        ]);

        $walletBalance = Auth::user()->wallet->balance;

        // todo: validation: withdraw amount must be less or equal to balance
        Validator::make($request->all(), [
            'amount' => [
                'required|numeric|min:1',
                function($attribute, $value, $fail) use ($walletBalance) {
                    if ($value > $walletBalance) {
                        return $fail($attribute.' is more that wallet balance.');
                    }
                },
            ],
            'card_number' => 'required|numeric|digits:16',
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
