<?php

namespace App\Http\Controllers\Manager;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('manager.user.profile', compact('user'));
    }

    public function passwordChange()
    {
        return view('manager.user.password.change');
    }

    public function passwordSave(Request $request)
    {
        if (!Hash::check($request['old_password'], Auth::user()->password)) {
            return redirect()->route('manager:password.change')->withErrors(['old_password' => 'Password is incorrect!']);
        }

        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        Auth::user()->update(['password' => bcrypt($request['password'])]);

        return redirect()->route('manager:user.view')->with(['success' => 'Password changed!']);

    }
}
