<?php

namespace App\Http\Controllers\User;

use App\Schedule;
use App\Timetable;
use Carbon\Carbon;
use Validator;
use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;

class AccountController extends Controller
{
    public function __construct()
    {
        $statuses = config('accounts.statuses');
        View::share('statuses', $statuses);
    }

    private static function isTimeBetween($sessionStart, $start, $end)
    {
        if (!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $sessionStart)) {
            return false;
        }

        if (!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $start)) {
            return false;
        }

        if (!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $end)) {
            return false;
        }

        $sessionStart = strtotime($sessionStart);
        $start = strtotime($start);
        $end = strtotime($end);

        return ($start <= $sessionStart && $sessionStart <= $end) ? true : false;
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
        $account = Account::findOrFail($id)->load('timetable');
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
            'session_start.*' => 'required|date_format:"H:i"',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $account = Account::findOrFail($id);
        $account->update($request->all());

        $timetableFields = $request->input('session_start');
        $timetables = Timetable::findOrFail(array_keys($timetableFields));

        foreach ($timetables as $timetable) {

            if ($timetable->user_changes >= config('accounts.user_change_limit')) continue;

            if (!Auth::user()->hasRole('admin') && !Auth::user()->hasRole('manager') && $timetable->updated_at >= Carbon::now()->subHours(24)) {
//                continue;
            }

            $sessionStart = $request->input('session_start.' . $timetable->id);

            if ($timetable->isFirst()) {

                $start = config('accounts.sessions.first.start');
                $end = config('accounts.sessions.first.end');

                if (self::isTimeBetween($sessionStart, $start, $end)) {
                    if (
                        $timetable->start_time != $request->input('session_start.' . $timetable->id) &&
                        $timetable->created_at != $timetable->updated_at
                    ) {
                        $timetable->increment('user_changes');
                    }
                    $timetable->update([
                        'start_time' => $sessionStart . ":00"
                    ]);
                }

            } elseif ($timetable->isSecond()) {

                $start = config('accounts.sessions.second.start');
                $end = config('accounts.sessions.second.end');

                if (self::isTimeBetween($sessionStart, $start, $end)) {
                    if (
                        $timetable->start_time != $request->input('session_start.' . $timetable->id) &&
                        $timetable->created_at != $timetable->updated_at
                    ) {
                        $timetable->increment('user_changes');
                    }
                    $timetable->update([
                        'start_time' => $sessionStart . ":00"
                    ]);
                }

            }
        }

        return back()->with(['success' => 'Session updated!']);
    }

    public function timetable($id)
    {
        $account = Account::findOrFail($id);
        return view('cabinet.accounts.timetable', compact('account'));
    }
}
