<?php

namespace App\Http\Controllers;

use App\Notifications\WithdrawRequested;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {

        $admins = User::getAdmins();

        $withdraw = Withdraw::all()->last();

        \Notification::send($admins, new WithdrawRequested($withdraw));

    }
}
