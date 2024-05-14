<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BackendAppointmentController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(Request $req)
    {
        if ($req->ajax()) {
            $dataTableList = Appointment::with(['doctor', 'patient'])->get();

            return DataTables::of($dataTableList)
                ->addIndexColumn()
                ->addColumn('appointment_date', function ($row) {
                    return $row->appointment_date;
                })
                ->addColumn('doctor', function ($row) {
                    $url = asset($row->doctor->attachment ? '/uploads/thumbnail/' . $row->doctor->attachment : 'no_image_person.png');
                    return '
                        <td>
                            <h2 class="table-avatar">
                                <a href=# class="avatar avatar-sm mr-2">
                                    <img class="avatar-img rounded-circle" src="' . $url . '" alt="">
                                </a>
                                <a href="#">' . $row->doctor->name . '</a>
                            </h2>
                        </td>
                    ';
                })
                ->addColumn('speciality', function ($row) {
                    return $row->doctor->speciality;
                })
                ->addColumn('patient', function ($row) {
                    $url = asset($row->patient->attachment ? '/uploads/thumbnail/' . $row->patient->attachment : 'no_image_person.png');
                    return '
                        <td>
                            <h2 class="table-avatar">
                                <a href=# class="avatar avatar-sm mr-2">
                                    <img class="avatar-img rounded-circle" src="' . $url . '" alt="">
                                </a>
                                <a href="#">' . $row->patient->firstname . ' ' . $row->patient->lastname . '</a>
                            </h2>
                        </td>
                    ';
                })
                ->addColumn('amount', function ($row) {
                    return $row->amount;
                })
                ->addColumn('status', function ($row) {
                    $selectedApproved = $row->status == 'Approved' ? 'selected' : '';
                    $selectedRejected = $row->status == 'Rejected' ? 'selected' : '';
                    $selectedPending = $row->status == 'Pending' ? 'selected' : '';

                    $statusClassMap = [
                        'Pending' => 'text-warning',
                        'Approved' => 'text-success',
                        'Rejected' => 'text-danger',
                    ];
                    $statusClass = $statusClassMap[$row->status] ?? 'text-warning';

                    return '
                        <td>
                            <div class="status-toggle">
                                <select id="status_' . $row->id . '" data-id="' . $row->id . '" class="status-select form-control ' . $statusClass . '">
                                    <option value="pending" class="text-warning" ' . $selectedPending . '>Pending</option>
                                    <option value="approved" class="text-success" ' . $selectedApproved . '>Approved</option>
                                    <option value="rejected" class="text-danger" ' . $selectedRejected . '>Rejected</option>
                                </select>
                            </div>
                        </td>
                    ';
                })
                ->rawColumns(['doctor', 'patient', 'status'])
                ->make(true);
        }

        return view('backend.appointment.index');
    }

    public function updateStatus(Request $req, $id): JsonResponse
    {
        // Validate the request
        $validatedData = $req->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        // Find the appointment
        $appointment = Appointment::find($id);

        // If the appointment does not exist, return an error response
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found.'], 404);
        }

        // Update the status
        $appointment->status = strtolower($req->status);
        $appointment->save();

        // Return a success response
        return response()->json(['success' => 'Status updated successfully.']);
    }
}
