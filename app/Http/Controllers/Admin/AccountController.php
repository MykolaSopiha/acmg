<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AccountController extends Controller
{
    public function __construct()
    {
        $statuses = config('accounts.statuses');
        View::share('statuses', $statuses);
    }

    public function index()
    {
        $accounts = Account::all();
        return view('admin.accounts.index', compact('accounts'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.accounts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
            'viewer_id' => 'required|numeric',
            'viewer_pass' => 'required|numeric',
            'schedule' => 'required',
            'comment' => 'required',
            'status' => 'required|numeric|min:0'
        ]);

        $account = new Account();
        $account->fill($request->all());
        $account->save();

        return redirect()->route('admin:accounts.index')->with(['success' => 'Account created!']);
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        $users = User::all();
        return view('admin.accounts.edit', compact('account', 'users'));
    }

    public function update(Request $request, $id)
    {
        Account::findOrFail($id)->update($request->all());
        return back()->with(['success' => 'Account updated!']);
    }

    public function delete($id)
    {
        Account::find($id)->delete();
        return back()->with(['success' => 'Account deleted!']);
    }
}
