@extends('dashboard.layouts.dashboard')
@section('title', 'Identity Cnntrol')
@section('dashboard')
    <div class="container-fluid">
        <!-- basic table -->

        <div class="row">
            <div class="col-12">
                <!-- Row -->
                <div class="row">
                    <!-- column -->
                    @forelse($users as $user)
                        <div class="col-lg-3 col-md-6">
                            <!-- Card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="data:image/svg+xml;base64,{!! base64_encode(QrCode::format('svg')->generate($user->code)) !!}"
                                     alt="{{ $user->fullname }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $user->fullname }}</h4>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                    @empty
                        <p>No data</p>
                @endforelse
                <!-- column -->
                </div>
            {{ $users->links() }}
            <!-- Row -->
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="{{ asset('../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    @parent
@endsection

