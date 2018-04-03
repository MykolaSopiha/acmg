<?php

namespace App\Http\Controllers\Manager;

use App\Session;
use App\Timetable;
use Auth;
use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $accounts = Account::where('manager_id', Auth::user()->id)->get();
        return view('manager.dashboard', compact('accounts'));
    }

    public function updateSession(Request $request)
    {
        $this->validate($request, [
            'sessionId' => 'required|exists:sessions,id',
            'status' => 'required'
        ]);

        $data = [
            'status' => $request['status'],
        ];

        $session = Session::findOrFail( $request['sessionId'] )->update($data);
        return back()->with(['success' => 'Session updated!']);
    }
}
