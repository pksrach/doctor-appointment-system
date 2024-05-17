@php use Carbon\Carbon; @endphp
<div id="pat_appointments" class="tab-pane fade show active">
    <div class="card card-table mb-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-center mb-0">
                    <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Appt Date</th>
                        <th>Booking Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['appointments'] as $appointment)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{ url('/doctor-profile', $appointment->doctor->id) }}"
                                       class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle"
                                             src="{{asset($appointment->doctor->attachment ? 'uploads/'.$appointment->doctor->attachment : 'doctor_default.png')}}"
                                             alt="User Image">
                                    </a>
                                    <a href="{{ url('/doctor-profile', $appointment->doctor->id) }}">
                                        {{!empty($appointment->doctor->name) ? $appointment->doctor->name : 'N/A'}}
                                        <span>{{!empty($appointment->doctor->specialty) ? $appointment->doctor->specialty : 'N/A'}}</span>
                                    </a>
                                </h2>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date, 'Asia/Phnom_Penh')->format('d M Y') }}
                                <span
                                    class="d-block text-info">{{ \Carbon\Carbon::parse($appointment->appointment_date, 'Asia/Phnom_Penh')->format('h:i A') }}</span>
                            </td>
                            <td>{{ $appointment->created_at->format('d M Y') }}</td>
                            <td>${{ $appointment->amount }}</td>
                            <td>
                                <span class="badge badge-pill
                                    {{ $appointment->status == 'Pending' ? 'bg-warning-light' :
                                    ($appointment->status == 'Approved' ? 'bg-success-light' :
                                    ($appointment->status == 'Rejected' ? 'bg-danger-light' : '')) }}">
                                    {{ $appointment->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
