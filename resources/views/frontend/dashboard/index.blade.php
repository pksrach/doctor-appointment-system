@extends('frontend.dashboard.master')
@section('content-dashboard')
    <div class="card">
        <div class="card-body pt-0">

            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Prescriptions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Medical
                                Records</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pat_billing" data-toggle="tab">Billing</a>
                    </li>
                </ul>
            </nav>
            <!-- /Tab Menu -->

            <!-- Tab Content -->
            <div class="tab-content pt-0">

                <!-- Appointment Tab -->
                @include('frontend.dashboard.sub-tab.appointment')
                <!-- /Appointment Tab -->

                <!-- Prescription Tab -->
                @include('frontend.dashboard.sub-tab.prescription')
                <!-- /Prescription Tab -->

                <!-- Medical Records Tab -->
                @include('frontend.dashboard.sub-tab.medical')
                <!-- /Medical Records Tab -->

                <!-- Billing Tab -->
                @include('frontend.dashboard.sub-tab.billing')
                <!-- /Billing Tab -->

            </div>
            <!-- Tab Content -->

        </div>
    </div>
@endsection
