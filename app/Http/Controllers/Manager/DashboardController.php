<?php

namespace App\Http\Controllers\Manager;

use App\Session;
use Auth;
use App\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $accountIds = Account::where('manager_id', Auth::user()->id)->pluck('id')->toArray();
        $sessions = Session::whereIn('account_id', $accountIds)->orderBy('id', 'desc')->paginate(10);
        return view('manager.dashboard', compact('sessions'));
    }

    public function updateSession(Request $request)
    {
        $request['start'] = ($request['start']) ? Carbon::parse($request['start']) : null;
        $request['end'] = ($request['end']) ? Carbon::parse($request['end']) : null;

        $this->validate($request, [
            'sessionId' => 'required|exists:sessions,id',
            'status' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $data = [
            'status' => $request['status'],
            'start' => $request['start'],
            'end' => $request['end'],
        ];

        $session = Session::findOrFail( $request['sessionId'] )->update($data);
        return back()->with(['success' => 'Session updated!']);
    }
}
