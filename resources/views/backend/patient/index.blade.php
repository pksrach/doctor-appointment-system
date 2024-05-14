@extends('backend.layouts.master')
@section('title', 'Patient Management')
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
                        <h3 class="page-title">List of Patient</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                            <li class="breadcrumb-item active">Patient</li>
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
                                        <th>Photo</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Date Of Birth</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Action</th>
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
                ajax: "{{route('backend.patient')}}",
                columns: [
                    {data: 'photo', name: 'photo'},
                    {data: 'firstname', name: 'firstname'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'gender', name: 'gender'},
                    {data: 'dob', name: 'dob'},
                    {data: 'phone', name: 'phone'},
                    {data: 'email', name: 'email'},
                    {data: 'location', name: 'location'},
                    {data: 'action', name: 'action', orderable: false}
                ]
            });
        });
    </script>
@endsection
