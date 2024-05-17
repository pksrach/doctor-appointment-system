<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Location;
use Illuminate\Http\Request;

class PatientDashbaordController extends Controller
{
    public function index()
    {
        $patient_id = auth()->user()->customer->id;
        $data['appointments'] = Appointment::where('patient_id', $patient_id)->get();
        return view('frontend.dashboard.index', compact('data'));
    }

    public function favorite()
    {
        return view('frontend.dashboard.favorite');
    }

    public function profileSetting()
    {
        $data = [
            'locations' => Location::all(), // Location model,
            'user' => auth()->user(), // User model
            'customer' => 'customer', // Customer model
        ];

        return view('frontend.dashboard.profile-setting', compact('data'));
    }

    public function profileUpdate(Request $req)
    {
        // Retrieve the authenticated user
        $user = $req->user();
        // Update associated customer entity if exists
        if ($user->customer) {
            // Convert location_id to integer if provided
            $locationId = $req->filled('location_id') ? intval($req->location_id) : null;

            $customer = $user->customer;
            // Validate the request attachment if attachment not change do not update
            $fileName = null;
            // Store the file in the 'public' disk (public folder in your Laravel project)
            if ($req->hasFile('attachment')) {
                // attachment exists or not
                $file = $req->file('attachment');
                // generate name with uuid for file name
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                // Store the file in the 'public' disk (public folder in your Laravel project)
                $destinationPath = public_path('/uploads');
                $file->move($destinationPath, $fileName);
            } else {
                // check if attachment is not empty
                if ($customer->attachment) {
                    $fileName = $customer->attachment;
                } else {
                    $fileName = null;
                }
            }

            $customer->update([
                'firstname' => $req->firstname ?? '',
                'lastname' => $req->lastname ?? '',
                'dob' => $req->dob,
                'gender' => $req->gender,
                'phone' => $req->phone,
                'attachment' => $fileName,
                'location_id' => $locationId,
            ]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function changePassword()
    {
        return view('frontend.dashboard.change-password');
    }
}
