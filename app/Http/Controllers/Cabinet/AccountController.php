<?php

namespace App\Http\Controllers\Cabinet;

use Validator;
use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function __construct()
    {
        $statuses = config('accounts.statuses');
        View::share('statuses', $statuses);
    }

    public function index()
    {
        $accounts = Account::withTrashed()->where('user_id', Auth::user()->id)->get();
        return view('cabinet.accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('cabinet.accounts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'profile_id' => 'required|numeric|min:1|unique:accounts,profile_id',
        ]);

        $data = [
            'profile_id' => $request['profile_id'],
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
        $validator = Validator::make($request->all(), [
            'profile_id' => [
                'required',
                'numeric',
                'min:1',
                Rule::unique('accounts')->ignore($request['profile_id'], 'profile_id')
            ],
            'viewer_id' => 'required|numeric|min:0',
            'viewer_pass' => 'required|numeric|min:0',
            'schedule' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $account = Account::findOrFail($id);
        $account->update($request->all());

        return redirect()->route('cabinet:accounts.index');
    }

    public function timetable($id)
    {
        $account = Account::findOrFail($id);
        return view('cabinet.accounts.timetable', compact('account'));
    }
}
