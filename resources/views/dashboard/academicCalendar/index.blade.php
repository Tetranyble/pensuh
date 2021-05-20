
@extends('dashboard.layouts.dashboard')
@section('title', 'Academic Calendars')
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
                        <h4 class="card-title">Academic Calendars</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Session</small></th>
                                    <th><small>Resumption</small></th>
                                    <th><small>Vacation</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($academics as $key => $academic)
                                    <tr  style="{{ $academic->active ? 'background-color: #ddd' : ''}}">
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td>{{ $academic->name }}</td>
                                        <td>{{ $academic->session->name }}</td>
                                        <td>{{ $academic->resumption }}</td>
                                        <td>{{ $academic->vacation }}</td>
                                        <td>
                                            <small><a title="edit {{ $academic->name }}" class="btn btn-sm btn-outline-warning" href="{{ route('academics.edit', $academic) }}"><i class="fa fa-edit"></i> Update</a></small>
                                            <small><a title="view {{ $academic->name }}" class="btn btn-sm btn-outline-info" href="{{ route('academics.show', $academic) }}"><i class="fa fa-eye"></i> More</a></small>
                                            <small><a title="delete {{ $academic->name }}" disabled="disabled" onclick="return false" class="btn btn-sm btn-outline-danger" href="{{ route('academics.destroy', $academic) }}"><i class="fa fa-trash"></i> Destroy</a></small>
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
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Session</small></th>
                                    <th><small>Resumption</small></th>
                                    <th><small>Vacation</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $academics->links() }}
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

