@extends('backend.layouts.master')
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
                        <h3 class="page-title">List of Doctors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                            <li class="breadcrumb-item active">Doctor</li>
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
                                        <th>Doctor Name</th>
                                        <th>Speciality</th>
                                        <th>Member Since</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--                                    <tr>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <h2 class="table-avatar">--}}
                                    {{--                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img--}}
                                    {{--                                                        class="avatar-img rounded-circle"--}}
                                    {{--                                                        src="assets/img/doctors/doctor-thumb-01.jpg"--}}
                                    {{--                                                        alt="User Image"></a>--}}
                                    {{--                                                <a href="profile.html">Dr. Ruby Perrin</a>--}}
                                    {{--                                            </h2>--}}
                                    {{--                                        </td>--}}
                                    {{--                                        <td>Dental</td>--}}

                                    {{--                                        <td>14 Jan 2019 <br><small>02.59 AM</small></td>--}}

                                    {{--                                        <td>$3100.00</td>--}}

                                    {{--                                        <td>--}}
                                    {{--                                            <div class="status-toggle">--}}
                                    {{--                                                <input type="checkbox" id="status_1" class="check" checked>--}}
                                    {{--                                                <label for="status_1" class="checktoggle">checkbox</label>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </td>--}}
                                    {{--                                    </tr>--}}
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
                ajax: "{{route('backend.doctor')}}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'speciality', name: 'speciality'},
                    {data: 'member_since', name: 'member_since'},
                    {data: 'phone', name: 'phone'},
                    {data: 'address', name: 'address'},
                    {data: 'status', name: 'status', "html": true},
                    {data: 'action', name: 'action', orderable: false}
                ]
            });
        });
    </script>
@endsection
