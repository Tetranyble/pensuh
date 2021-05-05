@extends('dashboard.layouts.dashboard')
@section('title', 'My Identity')
@section('dashboard')
<div class="container-fluid">
    <!-- basic table -->

    <div class="row">
        <div class="col-12">
            <!-- Row -->
            <div class="row">
                <!-- column -->
                <div class="offset-lg-4 offset-md-3 col-lg-3 col-md-6">
                    <!-- Card -->
                    <div class="card">
                        <img class="card-img-top img-fluid" src="data:image/svg+xml;base64,{!! base64_encode(QrCode::format('svg')->generate(auth()->user()->code)) !!}"
                             alt="{{ auth()->user()->id }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ auth()->user()->fullname }}</h4>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                <!-- column -->
            </div>
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

