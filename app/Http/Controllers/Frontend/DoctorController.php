<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function index(): View
    {
        $data['doctors'] = Doctor::all();
        return view('frontend.doctor.index', $data);
    }

    public function doctorProfile(): View
    {
        return view('frontend.doctor.profile');
    }
}
