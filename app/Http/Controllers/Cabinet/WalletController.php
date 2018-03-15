<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class WalletController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('cabinet.wallets.index', compact('user'));
    }
}
