<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class BackendDoctorController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(Request $req)
    {
        if ($req->ajax()) {
            $dataTableList = Doctor::all();

            return DataTables::of($dataTableList)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('speciality', function ($row) {
                    return $row->speciality;
                })
                ->addColumn('member_since', function ($row) {
                    return $row->member_since;
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone;
                })
                ->addColumn('address', function ($row) {
                    return $row->address;
                })
                ->addColumn('status', function ($row) {
                    $checked = $row->status ? 'checked' : '';
                    return '
                        <td>
                            <div class="status-toggle">
                                <input type="checkbox" id="status_' . $row->id . '" class="check" ' . $checked . '>
                                <label for="status_' . $row->id . '" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                    ';
                })
                ->addColumn('action', function ($row) {
                    return '<button type="button" id="' . $row->id . '" class="editRoom btn btn-primary btn-sm">Edit</button >&nbsp;
                        <button type="button" id="' . $row->id . '" class="deleteRoom btn btn-danger btn-sm">Delete</button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.doctor.index');
    }
}
