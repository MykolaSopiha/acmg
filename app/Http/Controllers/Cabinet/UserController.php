<?php

namespace App\Http\Controllers\Cabinet;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('cabinet.user.profile', compact('user'));
    }
}
