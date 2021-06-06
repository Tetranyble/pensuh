@extends('dashboard.layouts.dashboard')
@section('title', 'Receipts')
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
                                    <th><small>Item(s)</small></th>
                                    <th><small>Reference</small></th>
                                    <th><small>Amount</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($receipts as $key => $receipt)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td>
                                            @forelse($receipt->data['items'] as $item)
                                                <span>{{ $item['name'] }}</span>
                                                @empty
                                                <span>no data</span>
                                            @endforelse
                                        </td>
                                        <td>{{ $receipt->reference_id }}</td>
                                        <td>{{ money(receiptAmount($receipt->data['items'])) }}</td>
                                        <td><small>
                                                <a class="btn btn-sm btn-outline-info" href="{{ route('receipts.show', $receipt) }}"><i class="fa fa-eye"></i>See Report</a>

                                            </small></td>
                                    </tr>
                                @empty
                                    <tr>
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
                                    <th><small>Item(s)</small></th>
                                    <th><small>Reference</small></th>
                                    <th><small>Amount</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $receipts->links() }}
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

