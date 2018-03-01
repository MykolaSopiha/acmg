<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('admin.sessions.index', compact('sessions'));
    }

    public function create()
    {
        $users = User::all();
        $accounts = Account::all();

        return view('admin.sessions.create', compact('users', 'accounts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'account_id' => 'required|exists:accounts,id',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $data = [
            'account_id' => $request['account_id'],
            'start' => ($request['start']),
            'end' => ($request['end']),
            'manager_id' => Auth::user()->id,
            'comment' => $request['comment'],
        ];

        $session = new Session();
        $session->fill($data);
        $session->save();

        return back()->with(['success' => 'Session created!']);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {
        Session::findOrFail($id)->delete();
        return back()->with(['success' => 'Session deleted!']);
    }
}
