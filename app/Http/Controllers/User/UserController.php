<?php

namespace App\Http\Controllers\User;

use App\Country;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('cabinet.user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        // todo: make unique validation on update
        $this->validate($request, [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'nullable|numeric'
        ]);

        $user = Auth::user();
        $user->fill($request->toArray());
        $user->save();

        return back()->with(['success' => 'Profile updated']);
    }
}
