@extends('dashboard.layouts.dashboard')
@section('dashboard')
    <link href="{{ asset('../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="container-fluid">
            <!-- basic table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Course Taken By</h4>
                            <div class="well">
                                <ul>
                                    <li><b>Name: </b>{{ $courses->first()->teacher->first()->fullname }} <b>Code: </b>{{ $courses->first()->teacher->first()->code }}</li>
                                </ul>
                            </div>

                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                    <tr>
                                        <th><small>#</small></th>
                                        <th><small>Course Name</small></th>
                                        <th><small>Time Table</small></th>
                                        <th><small>Class Room</small></th>
                                        <th><small>Class</small></th>
                                        <th><small>Section</small></th>
                                        <th><small>All Student</small></th>
                                        <th><small>Action</small></th>
                                        <th><small>Give Marks</small></th>
                                        <th><small>View Marks</small></th>
                                        <th><small>Edit</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($courses as $key => $course)
                                        <tr>
                                            <td><small>{{ $key+1 }}</small></td>
                                            <td><small>{{ $course->name }}</small></td>
                                            <td><small>{{ 'Not Active' }}</small></td>
                                            <td><small>{{ $course->section->classroom }}</small></td>
                                            <td><small>{{ $course->section->classes->name }}</small></td>
                                            <td><small>{{ $course->section->name }}</small></td>
                                            <td><small><a class="btn btn-sm btn-outline-primary" href="{{ route('grades.course', $course) }}">Message Students</a></small></td>
                                            <td><small><a style="border-color:#2c3e50; color: #2c3e50; " class="btn btn-sm btn-outline-danger" href="{{ route('grades.course', $course) }}">Take Attendance</a></small></td>
                                            <td><small><a class="btn btn-sm btn-outline-danger" href="{{ route('grades.course', $course) }}">Submit Grade</a></small></td>
                                            <td><small><a class="btn btn-sm btn-outline-success" href="{{ route('grades.course', $course) }}">View Marks</a></small></td>
                                            <td><small><a class="btn btn-sm btn-outline-danger" href="{{ route('staff.edit', $course) }}">Edit</a></small></td>
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
                                        <th><small>Course Name</small></th>
                                        <th><small>Time Table</small></th>
                                        <th><small>Class Room</small></th>
                                        <th><small>Class</small></th>
                                        <th><small>Section</small></th>
                                        <th><small>All Student</small></th>
                                        <th><small>Action</small></th>
                                        <th><small>Give Marks</small></th>
                                        <th><small>View Marks</small></th>
                                        <th><small>Edit</small></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{ $courses->links() }}
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

