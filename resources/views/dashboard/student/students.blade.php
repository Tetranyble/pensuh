@extends('dashboard.layouts.dashboard')
@section('title', 'Students')
@section('dashboard')

    <div class="container-fluid">
        @include('components.flash-message')
        <ul>
            @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
            @endforeach
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Students</h4>
                        <div class="d-flex justify-content-between p-2 pb-1">
                            <div></div>
                            <div>
                                <form class="" method="GET" action="{{ route('students.index') }}">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="username/id/name" aria-label="username/id/name" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-secondary" type="button">search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                        <td><small>
                                                <a class="btn btn-sm btn-outline-danger" href="{{ route('student.edit', $student->username) }}">Edit</a>
                                                <a class="btn btn-sm {{ $student->active ? 'btn-outline-warning' : 'btn-outline-success' }}" href="{{ route('student.destroy', $student) }}" aria-expanded="false"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('deactivate-form-{{$student->id}}').submit();">
                                                    <i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">{{ $student->active ? 'Deactivate' : 'Activate' }}</span>
                                                </a>
                                                <form id="deactivate-form-{{$student->id}}" action="{{ route('student.destroy', $student) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </small></td>
                                        <td><small>{{ $student->code }}</small></td>
                                        <td>
                                            <small >
                                                <img data-src="{{ asset('storage/'.$student->photo) }}" src="{{ asset('storage/'.$student->photo) }}" style="border-radius: 50%; width: 25px; height: 25px">
                                                <a  href="{{ route('student.show', $student) }}">{{ \Illuminate\Support\Str::title($student->fullname) }}</a>
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
                        {{ $students->links() }}
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
    @parent
@endsection

