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

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('admin.accounts.edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'url' => 'required|max:255',
            'viewer_id' => 'required|numeric',
            'viewer_pass' => 'required|numeric',
            'schedule' => 'required',
        ]);

        $data = [
            'url' => $request['url'],
            'viewer_id' => $request['viewer_id'],
            'viewer_pass' => $request['viewer_pass'],
            'schedule' => $request['schedule'],
            'comment' => $request['comment'],
            'status' => $request['status'],
        ];

        Account::findOrFail($id)->update($data);

        return back()->with(['success' => 'Account updated!']);
    }

    public function delete($id)
    {
        Account::find($id)->delete();
        return back()->with(['success' => 'Account deleted!']);
    }

    public function trashList($id)
    {
        $accounts = Account::onlyTrashed($id)->get();
        return view('admin.accounts.trash', compact('accounts'));
    }

    public function accountConfirm($id)
    {
        $account = Account::findOrFail($id);

        $account->confirmed_at = strtotime(Carbon::now());
        $account->confirmed_by = Auth::user()->id;
        $account->save();

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
}
