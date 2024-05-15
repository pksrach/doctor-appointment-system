<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $data['doctors'] = Doctor::all();
        return view('frontend.index', $data);
    }

    public function termsConditions(): View
    {
        return view('frontend.term-condition');
    }

    public function privacyPolicy(): View
    {
        return view('frontend.privacy-policy');
    }

    public function aboutUs(): View
    {
        return view('frontend.about-us');
    }

    public function contactUs(): View
    {
        return view('frontend.contact-us');
    }
}
