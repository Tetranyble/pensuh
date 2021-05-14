@extends('dashboard.layouts.dashboard')
@section('title', 'Class Result')
@section('dashboard')
    <div class="container-fluid">
    @include('components.flash-message')
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(isset($grades))
                        <div style="color: #7c8798; padding-bottom: 1.5rem">
                            <h4 class="">
                                Marks given by <b>Teacher Code - </b>{{ $grades[0]->teacher->code }} <b>Name - </b> {{ $grades[0]->teacher->fullname }}
                            </h4>
                            <h5 class="p-1"><b>Course - </b>{{ $grades[0]->course->name }}
                                <b>Class - </b> {{ $grades[0]->course->section->classes->name }}
                                <b>Section - </b>{{ $grades[0]->course->section->name }}
                                <b>Exam - </b> {{ $grades[0]->examination->name }}
                            </h5>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Code</small></th>
                                    <th><small>Resumption test</small></th>
                                    <th><small>Notes</small></th>
                                    <th><small>Project</small></th>
                                    <th><small>Class work</small></th>
                                    <th><small>Assignment</small></th>
                                    <th><small>Midterm test</small></th>
                                    <th><small>Attendance</small></th>
                                    <th><small>Examination</small></th>
                                    <th><small>Total</small></th>
                                    <th><small>Position</small></th>
                                    <th><small>Class average</small></th>
                                    <th><small>Grade</small></th>
                                    <th><small>Remark/Signature</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($grades as $key => $grade)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td>
                                            <small>
                                                <img data-src="{{ asset($grade->student->photo) }}" src="{{ asset($grade->student->photo) }}" style="border-radius: 50%; width: 25px; height: 25px">
                                                <a href="{{ route('student.show', $grade->student) }}">{{ $grade->student->fullname }}</a>
                                            </small>
                                        </td>
                                        <td><small>{{ $grade->student->code }}</small></td>
                                        <td><small>{{ $grade->resumption_test }}</small></td>
                                        <td><small>{{ $grade->note }}</small></td>
                                        <td><small>{{ $grade->project }}</small></td>
                                        <td><small>{{ $grade->classwork }}</small></td>
                                        <td><small>{{ $grade->assignment }}</small></td>
                                        <td><small>{{ $grade->midterm_test }}</small></td>
                                        <td><small>{{ $grade->attendance }}</small></td>
                                        <td><small>{{ $grade->exam }}</small></td>
                                        <td><small>{{ $grade->total }}</small></td>
                                        <td><small>{{ $grade->position }}</small></td>
                                        <td><small>{{ $grade->average }}</small></td>
                                        <td><small>{{ $grade->grade }}</small></td>
                                        <td><small>{{ $grade->remark }}</small></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>

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


