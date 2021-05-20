@extends('dashboard.layouts.dashboard')
@section('title', 'Create Academic Calendar')
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
                        <h4 class="card-title">New Academic Calendar</h4>
                        <form method="POST" action="{{ route('academics.store') }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                            <label for="name">Name
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('name')}}</span></span>
                                            </label>
                                            <input autofocus="true" name="name" class="form-control" id="name" type="text"
                                                   placeholder="enter academic calendar name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('resumption')) ? 'has-error' : ''}}">
                                            <label for="resumption">Resumption Date
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('resumption')}}</span></span>
                                            </label>
                                            <input name="resumption" class="form-control" id="resumption" type="date"
                                                   placeholder="enter school resumption date" value="{{ old('resumption') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('vacation')) ? 'has-error' : ''}}">
                                            <label for="vacation">Vacation Date
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('vacation')}}</span></span>
                                            </label>
                                            <input name="vacation" class="form-control" id="vacation" type="date"
                                                   placeholder="enter school vacation date" value="{{ old('vacation') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('session_id')) ? 'has-error' : ''}}">
                                            <label for="session_id">Academic Session
                                                <span class="text-danger"><span
                                                        class="text-danger h6">{{$errors->first('session_id')}}</span></span>
                                            </label>
                                            <select name="session_id" class="form-control" id="session_id" type="text">
                                                <option value="">select academic session</option>
                                                @forelse($sessions as $session)
                                                    <option
                                                        {{ old('session_id') == $session->id ? "selected" : "" }} value="{{ $session->id }}">{{ $session->name }}</option>
                                                @empty
                                                    <option value="">No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group {{($errors->has('body')) ? 'has-error' : ''}}">
                                            <label for="body">Academic Calendar Body
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('body')}}</span></span>
                                            </label>
                                            <textarea cols="5" rows="5" name="body" class="form-control" id="body" type="text"
                                                      placeholder="enter academic calendar body">{{ old('body') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
@endsection

