<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'max:255',
                Rule::unique('users')->ignore($request['name'], 'name')
            ],
            'email' => [
                'required',
                'max:255',
                Rule::unique('users')->ignore($request['email'], 'email')
            ],
            'phone' => [
                'required',
                'numeric',
                Rule::unique('users')->ignore($request['phone'], 'phone')
            ],
            'full_name' => 'string|max:255|nullable',
            'skype' => [
                'string',
                'max:255',
                'nullable',
                Rule::unique('users')->ignore($request['skype'], 'skype')
            ],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $user->fill($request->toArray());
        $user->save();

        return back()->with(['success' => 'Profile updated']);
    }
}
