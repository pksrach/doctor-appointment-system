<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('frontend.doctor.index');
    }

    public function doctorProfile()
    {
        return view('frontend.doctor.profile');
    }
}
