<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientDashbaordController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.index');
    }

    public function favorite()
    {
        return view('frontend.dashboard.favorite');
    }

    public function profileSetting()
    {
        return view('frontend.dashboard.profile-setting');
    }

    public function changePassword()
    {
        return view('frontend.dashboard.change-password');
    }
}
