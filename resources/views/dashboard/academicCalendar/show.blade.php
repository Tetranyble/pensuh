@extends('dashboard.layouts.dashboard')
@section('title', 'Show Academic Calendar')
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
                        <div class="form-body">
                            <div class="row" style="padding-bottom: 2rem">

                                <div class="col-md-6"><h3>{{ $academic->name }}</h3></div>
                                <div class="col-md-6"><h3>{{ $academic->session->name }}</h3></div>
                                <div class="col-md-6"><h3>{{ $academic->resumption }}</h3></div>
                                <div class="col-md-6"><h3>{{ $academic->vacation }}</h3></div>
                                <hr style="border-top: 3px solid #bbb;">
                                <div style="padding-top: 3rem" class="col-md-12">{{ $academic->body }}</div>


                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <a  class="btn btn-md btn-outline-dark" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Back</a>
                                    <a title="edit {{ $academic->name }}" class="btn btn-md btn-outline-warning" href="{{ route('academics.edit', $academic) }}"><i class="fa fa-edit"></i> Update</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
@endsection

