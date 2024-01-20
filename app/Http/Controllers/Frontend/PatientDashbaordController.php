<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Type\NullType;

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
        $data = [
            'locations' =>  Location::all(), // Location model,
            'user' => auth()->user(), // User model
            'customer' => 'customer', // Customer model
        ];

        return view('frontend.dashboard.profile-setting', compact('data'));
    }

    public function profileUpdate(Request $req)
    {
        // Convert location_id to integer
        Log::info('Request location=>' . $req['location_id']);
        if ($req['location_id'] != '' || $req['location_id'] !== null) {
            $req['location_id'] = intval($req['location_id']);
        } else {
            $req['location_id'] = null;
        }

        $user = auth()->user(); // Retrieve the authenticated user
        $user->update($req->except('_token'));

        if ($user->customer) {
            $customer = $user->customer;
            $customer->update($req->except('_token'));
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function changePassword()
    {
        return view('frontend.dashboard.change-password');
    }
}
