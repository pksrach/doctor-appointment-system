<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('frontend.booking.index');
    }

    public function checkout(){
        return view('frontend.booking.checkout');
    }
}
