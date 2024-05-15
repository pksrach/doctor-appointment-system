<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index($id): View
    {
        $doctor = Doctor::findOrFail($id);
        return view('frontend.booking.index', compact('doctor'));
    }

    public function checkout()
    {
        return view('frontend.booking.checkout');
    }
}
