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
                        <h4 class="card-title">Payable Fees</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Amount</small></th>
                                    <th><small>School Type</small></th>
                                    <th><small>Description</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($fees as $key => $fee)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td>{{ $fee->name }}</td>
                                        <td>{{ $fee->amount }}</td>
                                        <td>{{ $fee->school_type_id ? $fee->schoolType->name : 'General Fee' }}</td>
                                        <td>{{ $fee->description }}</td>

                                        <td>
                                            <small><a title="edit {{ $fee->name }}" class="btn btn-sm btn-outline-warning" href="{{ route('fees.edit', $fee) }}"><i class="fa fa-edit"></i> Update</a></small>
                                            <small><a title="delete {{ $fee->name }}" disabled="disabled" onclick="return false" class="btn btn-sm btn-outline-danger" href="{{ route('fees.destroy', $fee) }}"><i class="fa fa-trash"></i> Destroy</a></small>
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
                                    <th><small>Amount</small></th>
                                    <th><small>School Type</small></th>
                                    <th><small>Description</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $fees->links() }}
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

