<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        session(['date' => $request->date]);
        session(['time' => $request->time]);

        return response()->json(['status' => 'success']);
    }
}
