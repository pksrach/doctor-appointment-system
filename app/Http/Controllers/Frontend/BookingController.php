<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index($id): View
    {
        $doctor = Doctor::findOrFail($id);
        return view('frontend.booking.index', compact('doctor'));
    }

    public function checkout($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('frontend.booking.checkout', compact('doctor'));
    }

    public function makeCheckout(Request $req): \Illuminate\Http\RedirectResponse
    {
        $appointment = new Appointment();
        $appointment->doctor_id = $req->doctorId;
        $appointment->patient_id = $req->customerId;
        // convert selectedDateTime to Y-m-d H:i:s
        $appointment->appointment_date = date('Y-m-d H:i:s', strtotime($req->selectedDateTime));
        $appointment->amount = $req->amount;
        $appointment->status = 'pending';
        $appointment->payment_method = $req->paymentMethod;
        if ($req->hasFile('attachment')) {
            $appointment->payment_image = $req->attachment->getClientOriginalName();
            $req->attachment->move(public_path('uploads/thumbnail'), $req->attachment->getClientOriginalName());
        }

        $appointment->save();

        return redirect()->route('patient.dashboard')->with('success', 'Appointment Booked Successfully');
    }
}
