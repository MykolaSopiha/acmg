<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications;
        Auth::user()->unreadNotifications->markAsRead();
        return view('admin.notifications.index', compact('notifications'));
    }
}
