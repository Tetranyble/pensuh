@extends('dashboard.layouts.dashboard')
@section('title', 'Students')
@section('dashboard')
    <link href="{{ asset('../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Download</h4>
                        <div class="well"><h6>No implemetation yet</h6></div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Action</small></th>
                                    <th><small>Code</small></th>
                                    <th><small>Full Name</small></th>
                                    <th><small>Attendance</small></th>
                                    <th><small>Session</small></th>
                                    <th><small>Class</small></th>
                                    <th><small>Father</small></th>
                                    <th><small>Mother</small></th>
                                    <th><small>Gender</small></th>
                                    <th><small>Blood</small></th>
                                    <th><small>Phone</small></th>
                                    <th><small>Address</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($students as $key => $student)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td><small><a class="btn btn-sm btn-outline-danger" href="{{ route('student.edit', $student->username) }}">Edit</a></small></td>
                                        <td><small>{{ $student->code }}</small></td>
                                        <td>
                                            <small>
                                                <img data-src="{{ asset($student->photo) }}" src="{{ asset($student->photo) }}" style="border-radius: 50%; width: 25px; height: 25px">
                                                <a href="{{ route('student.show', $student) }}">{{ $student->fullname }}</a>
                                            </small>
                                        </td>
                                        <td><small><a class="btn btn-primary" href="{{ route('attendances.show', $student) }}">View Attendance</a></small></td>
                                        <td><small>{{ $student->session }} <span class="label label-success">promoted/new</span></small></td>
                                        <td><small>{{ $student->studentInfo->section->classes->name . ' / '.  $student->studentInfo->section->name }}</small></td>
                                        <td><small>{{ $student->studentInfo->father_name }}</small> <br><small>{{ $student->studentInfo->father_phone_number }}</small></td>
                                        <td><small>{{ $student->studentInfo->mother_name }}</small><br><small>{{ $student->studentInfo->mother_phone_number }}</small></td>
                                        <td><small>{{ $student->gender->name }}</small></td>
                                        <td><small>{{ $student->blood->name }}</small></td>
                                        <td><small>{{ $student->phone }}</small></td>
                                        <td style="white-space: unset"><small>{{ $student->address }}</small></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Action</small></th>
                                    <th><small>Code</small></th>
                                    <th><small>Full Name</small></th>
                                    <th><small>Attendance</small></th>
                                    <th><small>Session</small></th>
                                    <th><small>Class</small></th>
                                    <th><small>Father</small></th>
                                    <th><small>Mother</small></th>
                                    <th><small>Gender</small></th>
                                    <th><small>Blood</small></th>
                                    <th><small>Phone</small></th>
                                    <th><small>Address</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
        <!--This page plugins -->

@endsection

@section('script')
            <script src="{{ asset('../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('../dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    @parent
@endsection

