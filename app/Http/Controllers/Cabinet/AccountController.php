<?php

namespace App\Http\Controllers\Cabinet;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $accounts = Account::where('user_id', Auth::user()->id)->get();
        return view('cabinet.accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('cabinet.accounts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|max:255',
            'viewer_id' => 'required|numeric',
            'viewer_pass' => 'required|numeric',
            'schedule' => 'required',
        ]);

        $data = [
            'url' => $request['url'],
            'user_id' => Auth::user()->id,
            'viewer_id' => $request['viewer_id'],
            'viewer_pass' => $request['viewer_pass'],
            'schedule' => $request['schedule'],
            'comment' => "",
            'status' => 0, // status = "expected"
        ];

        $account = new Account();
        $account->fill($data);
        $account->save();

        return redirect()->route('cabinet:accounts.index')->with(['success' => 'Account created!']);
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('cabinet.accounts.edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        return view('cabinet.accounts.edit', compact('account'));
    }
}
