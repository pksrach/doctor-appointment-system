<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BackendPatientController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(Request $req)
    {
        if ($req->ajax()) {
            $dataTableList = Customer::all();

            return DataTables::of($dataTableList)
                ->addIndexColumn()
                ->addColumn('firstname', function ($row) {
                    return $row->firstname;
                })
                ->addColumn('lastname', function ($row) {
                    return $row->lastname;
                })
                ->addColumn('gender', function ($row) {
                    $genders = ['0' => 'Other', '1' => 'Male', '2' => 'Female'];
                    return $genders[$row->gender];
                })
                ->addColumn('dob', function ($row) {
                    return $row->dob ? $row->dob->format('d-m-Y') : '';
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone;
                })
                ->addColumn('email', function ($row) {
                    return $row->user ? $row->user->email : '';
                })
                ->addColumn('location', function ($row) {
                    return $row->location ? $row->location->name : '';
                })
                ->addColumn('action', function ($row) {
                    return '<button type="button" id="' . $row->id . '" class="editRoom btn btn-primary btn-sm">Edit</button >&nbsp;
                        <button type="button" id="' . $row->id . '" class="deleteRoom btn btn-danger btn-sm">Delete</button>';
                })
                ->rawColumns(['action', 'gender'])
                ->make(true);
        }

        return view('backend.patient.index');
    }
}
