<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DateTime;
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
                ->addColumn('photo', function ($row) {
                    $url = asset($row->avatar ? '/uploads/thumbnail/' . $row->attachment : 'no_image_person.png');
                    return '
                        <td>
                            <h2 class="table-avatar">
                                <a href=# class="avatar avatar-sm mr-2">
                                    <img class="avatar-img rounded-circle" src="' . $url . '" alt="">
                                </a>
                            </h2>
                        </td>
                    ';
                })
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
                    if ($row->dob) {
                        $date = new DateTime($row->dob);
                        return $date->format('Y-m-d');
                    } else {
                        return '';
                    }
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
                ->rawColumns(['photo', 'action', 'gender'])
                ->make(true);
        }

        return view('backend.patient.index');
    }
}
