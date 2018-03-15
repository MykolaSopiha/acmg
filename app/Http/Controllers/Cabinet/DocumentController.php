<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function start()
    {
        return view('cabinet.docs.start');
    }

    public function faq()
    {
        return view('cabinet.docs.faq');
    }
}
