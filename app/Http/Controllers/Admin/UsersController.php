<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.view', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function attachAdminRole($user_id)
    {
        $user = User::findOrFail($user_id);
        $adminRole = Role::where('name', 'admin')->first();
        $user->attachRole($adminRole);
        return back()->with(['success' => 'Admin rights are attached!']);
    }

    public function detachAdminRole($user_id)
    {
        $user = User::findOrFail($user_id);
        $adminRole = Role::where('name', 'admin')->first();
        $user->detachRole($adminRole);
        return back()->with(['success' => 'User rights are detached!']);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return back()->with(['success' => 'User deleted!']);
    }
}