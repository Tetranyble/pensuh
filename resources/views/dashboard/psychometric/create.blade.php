@extends('dashboard.layouts.dashboard')
@section('title', 'New Behavioural And Moral Rating')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        @foreach($errors->all() as $message)
            <li class="text-danger">{{ $message }}</li>
        @endforeach
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Behavioural And Moral Rating</h4>
                        <div class="d-flex pt-3">
                        </div>
                        <form method="POST" action="{{ route('psychometrics.store') }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                            <label for="name">Name
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('name')}}</span></span>
                                            </label>
                                            <input name="name" class="form-control" id="name" type="text"
                                                      placeholder="excelence/good/fair..." value="{{ old('name') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('key')) ? 'has-error' : ''}}">
                                            <label for="key">Key
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('key')}}</span></span>
                                            </label>
                                            <input name="key" class="form-control" id="key" type="text"
                                                   placeholder="5/4/3..." value="{{ old('key') }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


