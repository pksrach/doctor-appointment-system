@extends('backend.layouts.master')
@section('title', 'Appointment Management')
@section('style-datatable')
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables/datatables.min.css')}}">
@endsection
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">List of Appointment</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Appointment</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTableList" class="datatable table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>Appointment Date</th>
                                        <th>Doctor Name</th>
                                        <th>Speciality</th>
                                        <th>Patient Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="myModalBody">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-datatable')
    <script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTableList').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "{{route('backend.appointment')}}",
                columns: [
                    {data: 'appointment_date', name: 'appointment_date'},
                    {data: 'doctor', name: 'doctor'},
                    {data: 'speciality', name: 'speciality'},
                    {data: 'patient', name: 'patient'},
                    {data: 'amount', name: 'amount'},
                    {data: 'status', name: 'status', orderable: false}
                ]
            });
        });
    </script>

    <script>
        // Listen on change color status
        $(document).ready(function () {
            $('#dataTableList').on('draw.dt', function () {
                $('.status-select').change(function () {
                    var status = $(this).val();
                    $(this).removeClass('text-warning text-success text-danger');

                    switch (status) {
                        case 'pending':
                            $(this).addClass('text-warning');
                            break;
                        case 'approved':
                            $(this).addClass('text-success');
                            break;
                        case 'rejected':
                            $(this).addClass('text-danger');
                            break;
                    }
                });
            });
        });
    </script>

    <script>
        // Listen on change status
        $(document).ready(function () {
            $('#dataTableList').on('draw.dt', function () {
                $('.status-select').change(function () {
                    var appointment_id = $(this).data('id');
                    var status = $(this).val();
                    var url = "{{route('backend.appointment.status', ':appointment_id')}}";
                    url = url.replace(':appointment_id', appointment_id);

                    $.ajax({
                        url: url,
                        type: 'PUT',
                        data: {
                            status: status,
                            _token: '{{ csrf_token() }}' // Add this line to include the CSRF token in the request
                        },
                        success: function (response) {
                            if (response.success) {
                                // Update the modal body with the success message
                                $('#myModalBody').text(response.success);
                            } else {
                                // Update the modal body with the error message
                                $('#myModalBody').text(response.error);
                            }

                            // Show the modal
                            $('#myModal').modal('show');
                        }
                    });
                });
            });
        });
    </script>
@endsection
