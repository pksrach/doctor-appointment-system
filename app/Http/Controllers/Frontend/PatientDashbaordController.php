<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Models\Location;
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
        $locations = Location::all(); // Location model

        return view('frontend.dashboard.profile-setting', compact('locations'));
    }

    public function changePassword()
    {
        return view('frontend.dashboard.change-password');
    }
}
