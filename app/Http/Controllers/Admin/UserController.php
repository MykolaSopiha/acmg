<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.user.profile', compact('user'));
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
