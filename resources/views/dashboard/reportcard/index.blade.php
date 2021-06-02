@extends('dashboard.layouts.dashboard')
@section('title', 'Report Cards')
@section('dashboard')
    <link href="{{ asset('../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
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
                        <h4 class="card-title">Reports</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Code</small></th>
                                    <th><small>Total</small></th>
                                    <th><small>Average</small></th>
                                    <th><small>Position</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($reports as $key => $report)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td>
                                            <img data-src="{{ asset($report->student->photo) }}" src="{{ asset($report->student->photo) }}" style="border-radius: 50%; width: 25px; height: 25px">
                                            <a href="{{ route('student.show', $report->student) }}">{{ $report->student->fullname }}</a>
                                        </td>
                                        <td>{{ $report->student->code }}</td>
                                        <td>{{ $report->total }}</td>
                                        <td>{{ $report->average }}</td>
                                        <td>{{ $report->position }}</td>
                                        <td><small><a class="btn btn-sm btn-outline-info" href="{{ route('report.show', $report) }}"><i class="fa fa-eye"></i>See Report</a>
{{--                                                <a disabled="disabled" onclick="return false;" title="glitches" class="btn btn-sm btn-outline-info" href="{{ route('download_reports.show', $report) }}"><i class="fa fa-download"></i>Download</a>--}}
                                                @can('form_teacher')
                                                <a class="btn btn-sm btn-outline-dark" href="{{ route('comments.create', ['report'=> $report->id, 'student'=> $report->student->id, 'role' => 'form_teacher']) }}"><i class="fa fa-plus"></i>F.T Comment</a>
                                                @endcan
                                                @can('counsellor')
                                                <a class="btn btn-sm btn-outline-orange" href="{{ route('comments.create', ['report'=> $report->id, 'student'=> $report->student->id, 'role' => 'counsellor']) }}"><i class="fa fa-plus"></i>C. Comment</a>
                                                @endcan
                                                @can('sport')
                                                    <a class="btn btn-sm btn-outline-cyan" href="{{ route('comments.create', ['report'=> $report->id, 'student'=> $report->student->id, 'role' => 'sport']) }}"><i class="fa fa-plus"></i>S. Comment</a>
                                                @endcan
                                                @can('principal')
                                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('comments.create', ['report'=> $report->id, 'student'=> $report->student->id, 'role' => 'principal']) }}"><i class="fa fa-plus"></i>P. Comment</a>
                                                @endcan
                                            </small></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Code</small></th>
                                    <th><small>Total</small></th>
                                    <th><small>Average</small></th>
                                    <th><small>Position</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    @parent
@endsection

