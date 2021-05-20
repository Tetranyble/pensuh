@extends('dashboard.layouts.dashboard')
@section('title', 'New Syllabus')
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
                        <h4 class="card-title">New Syllabus</h4>
                        <form method="POST" action="{{ route('syllabi.store') }}">
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
                                                   placeholder="enter syllabus name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group {{($errors->has('body')) ? 'has-error' : ''}}">
                                            <label for="body">Syllabus Body
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('body')}}</span></span>
                                            </label>
                                            <textarea cols="5" rows="5" name="body" class="form-control" id="body" type="text"
                                                      placeholder="enter syllabus body">{{ old('body') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Submit</button>
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

