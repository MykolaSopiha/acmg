<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\User;
use Carbon\Carbon;
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

//    public function create()
//    {
//        $users = User::all();
//        return view('admin.accounts.create', compact('users'));
//    }
//
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'url' => 'required|max:255',
//            'user_id' => 'required|exists:users,id',
//            'viewer_id' => 'required|numeric',
//            'viewer_pass' => 'required|numeric',
//            'schedule' => 'required',
//            'comment' => 'required',
//            'status' => 'required|numeric|min:0'
//        ]);
//
//        $account = new Account();
//        $account->fill($request->all());
//        $account->save();
//
//        return redirect()->route('admin:accounts.index')->with(['success' => 'Account created!']);
//    }

    public function view($id)
    {
        $account = Account::withTrashed()->findOrFail($id);
        return view('admin.accounts.view', compact('account'));
    }

    public function edit($id)
    {
        $account = Account::withTrashed()->findOrFail($id);
        $users = User::all();
        $managers = User::getManagers();
        return view('admin.accounts.edit', compact('account', 'users', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'profile_id' => 'required|numeric',
            'manager_id' => 'numeric|exists:users,id',
            'viewer_id' => 'numeric|nullable',
            'viewer_pass' => 'numeric|nullable',
        ]);

        $data = [
            'viewer_id' => $request['viewer_id'],
            'viewer_pass' => $request['viewer_pass'],
            'manager_id' => $request['manager_id'],
            'comment' => $request['comment'],
            'status' => $request['status'],
        ];

        Account::findOrFail($id)->update($data);

        return back()->with(['success' => 'Account updated!']);
    }

    public function delete($id)
    {
        Account::findOrFail($id)->delete();
        return back()->with(['success' => 'Account deleted!']);
    }

    public function restore($id)
    {
        Account::withTrashed()->findOrFail($id)->restore();
        return back()->with(['success' => 'Account restored!']);
    }

    public function trashList()
    {
        $accounts = Account::onlyTrashed()->get();
        return view('admin.accounts.trash', compact('accounts'));
    }

    public function accountConfirm($id)
    {
        $account = Account::findOrFail($id);
        $account->confirm();
        return back()->with(['success' => 'Account confirmed!']);
    }

    public function accountDeposits($id)
    {
        $account = Account::findOrFail($id);
        $deposits = $account->deposit->get();

        return view('admin.accounts.deposits', compact('account', 'deposits'));
    }

    public function accountSessions($id)
    {
        $account = Account::findOrFail($id);
        $sessions = $account->session->get();

        return view('admin.accounts.sessions', compact('account', 'sessions'));
    }

    public function setStatus($id, $status_id)
    {
        $statuses = config('accounts.statuses');

        if ($statuses[$status_id] == 'confirmed') {
            Account::findOrFail($id)->confirm();
        } else {
            Account::findOrFail($id)->update([
                'status' => $status_id,
            ]);
        }
        return back()->with(['success' => 'Account updated']);
    }
}
