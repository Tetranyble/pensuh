@extends('dashboard.layouts.dashboard')
@section('title', 'Report Card')
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
                        <h4 class="card-title">{{ $report->student->fullname }}</h4>

                        <div class="form-body">
                           <div class="row">

                           </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-actions d-flex justify-content-between">
                            <div>
                                {{--                                    {{ $reports->links() }}--}}
                            </div>
                            <div class="text-right">
                                <a href="#" class="btn btn-dark">Print</a>
                                <a href="#" class="btn btn-info">Download</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


