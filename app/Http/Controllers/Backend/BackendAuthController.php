<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class BackendAuthController extends Controller
{
    public function backendLogin(): View
    {
        return view('backend.auth.login');
    }
}
