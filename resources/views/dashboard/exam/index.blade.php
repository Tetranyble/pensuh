
@extends('dashboard.layouts.dashboard')
@section('title', 'Fees')
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
                        <h4 class="card-title">Exams</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Session</small></th>
                                    <th><small>School Calendar</small></th>
                                    <th><small>Start</small></th>
                                    <th><small>End</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($exams as $key => $exam)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td>{{ $exam->name }}</td>
                                        <td>{{ $exam->academicCalendar->session->name }}</td>
                                        <td>{{ $exam->academicCalendar->name }}</td>
                                        <td>{{ $exam->start}}</td>
                                        <td>{{ $exam->end }}</td>

                                        <td>
                                            <small><a title="edit {{ $exam->name }}" class="btn btn-sm btn-outline-warning" href="{{ route('exams.edit', $exam) }}"><i class="fa fa-edit"></i> Update</a></small>
                                            <small><a title="delete {{ $exam->name }}" disabled="disabled" onclick="return false" class="btn btn-sm btn-outline-danger" href="{{ route('exams.destroy', $exam) }}"><i class="fa fa-trash"></i> Destroy</a></small>
                                            <small>
                                                <a class="btn btn-sm  {{ $exam->result_published == 0 ? 'btn-outline-warning' : 'btn-outline-success'  }}" href="{{ route('exams.publish', $exam) }}" aria-expanded="false"
                                                   onclick="event.preventDefault();
                                                   alert('{{ $exam->result_published == 0 ? 'Are you sure want to publish this result?' : 'Are you sure you want to unpublish this result?' }}')
                                                     document.getElementById('publish_result').submit();">
                                                    <i data-feather="bell" class="feather-icon"></i><span class="hide-menu">{{ $exam->result_published == 0 ? 'Publish' : 'Unpublish' }}</span>
                                                </a>
                                                <form id="publish_result" action="{{ route('exams.publish', $exam) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="result_published" value="{{ $exam->result_published == 0 ? 1 : 0 }}">
                                                </form>
                                            </small>
                                        </td>
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
                                    <th><small>Session</small></th>
                                    <th><small>School Calendar</small></th>
                                    <th><small>Start</small></th>
                                    <th><small>End</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $exams->links() }}
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

