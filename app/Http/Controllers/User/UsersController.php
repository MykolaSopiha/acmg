<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $referals = Auth::user()->getReferals();
        return view('cabinet.referals.index', compact('referals'));
    }

    public function view($id)
    {
        $referal = User::where([
            'id' => $id,
            'parent_id' => Auth::user()->id,
        ])->get();
        return view('cabinet.referals.view', compact('referal'));
    }

    public function account($id)
    {
        $referals_ids = self::getReferals()->pluck('id');
        $accounts = Account::whereIn('user_id', $referals_ids)->get();
        return view('cabinet.referals.accounts', compact('accounts'));
    }

    public function getReferals()
    {
        return User::where('parent_id', Auth::user()->id)->get();
    }
}
