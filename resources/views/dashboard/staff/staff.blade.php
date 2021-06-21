@extends('dashboard.layouts.dashboard')
@section('title', 'Admin(s) | Principal(s) | Staff | User(s)')
@section('dashboard')
    <link href="{{ asset('../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
        <div class="container-fluid">
            @include('components.flash-message')
            <ul>
                @foreach($errors->all() as $message)
                    <li class="text-danger">{{ $message }}</li>
                @endforeach
            </ul>
            <!-- basic table -->
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
                                        <th><small>Phone</small></th>
                                        <th><small>Attendance</small></th>
                                        <th><small>Email</small></th>
                                        <th><small>Course</small></th>
                                        <th><small>Gender</small></th>
                                        <th><small>Blood</small></th>
                                        <th><small>Address</small></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($staffs as $key => $student)
                                        <tr>
                                            <td><small>{{ $key+1 }}</small></td>
                                            <td><small>
                                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('staff.edit', $student) }}">Edit</a>
                                                    <a class="btn btn-sm {{ $student->active ? 'btn-outline-warning' : 'btn-outline-success' }}" href="{{ route('staff.destroy', $student) }}" aria-expanded="false"
                                                       onclick="event.preventDefault();
                                                           document.getElementById('deactivate-form-{{$student->id}}').submit();">
                                                        <i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">{{ $student->active ? 'Deactivate' : 'Activate' }}</span>
                                                    </a>
                                                    <form id="deactivate-form-{{$student->id}}" action="{{ route('staff.destroy', $student) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                </small></td>
                                            <td><small>{{ $student->code }}</small></td>
                                            <td>
                                                <small>
                                                    <a class="btn btn-sm btn-outline-success" href="{{ asset('storage/'.$student->photo) }}" download>
                                                        <img data-src="{{ asset('storage/'.$student->photo) }}" src="{{ asset('storage/'.$student->photo) }}" style="border-radius: 50%; width: 25px; height: 25px">
                                                    </a>
                                                    <a target="_blank" href="{{ route('teachers.show', $student) }}">{{ $student->fullname }}</a>
                                                </small>
                                            </td>
                                            <td><small>{{ $student->phone }}</small></td>
                                            <td><small><a class="btn btn-sm btn-outline-primary" href="{{ route('attendances.show', $student) }}">View Attendance</a></small></td>

                                            <td><small>{{ $student->email }}</small></td>

                                            <td><small><a href="{{ route('teacher.courses', $student->id) }}">All Courses</a></small></td>
                                            <td><small>{{ $student->gender->name ? $student->gender->name : '' }}</small></td>
                                            <td><small>{{ $student->blood->name ? $student->blood->name : ''}}</small></td>
                                            <td><small>{{ $student->address ? $student->address : '' }}</small></td>
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
                                        <th><small>Phone</small></th>
                                        <th><small>Attendance</small></th>
                                        <th><small>Email</small></th>
                                        <th><small>Course</small></th>
                                        <th><small>Gender</small></th>
                                        <th><small>Blood</small></th>
                                        <th><small>Address</small></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{ $staffs->links() }}
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

