@extends('dashboard.layouts.dashboard')
@section('title', 'New Section')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Class</h4>
                        <div class="d-flex ">
                            @forelse($formteachers as $teacher)
                                @empty
                                <p class="text-warning">There appears to be no <b>Form Teacher</b> in<b> {{ $home->school_name }}</b> <a href="#" class=" btn btn-sm text-danger">Assign Role</a></p>
                            @endforelse
                        </div>
                        <form method="POST" action="{{ route('sections.store', ['class' => request('class')]) }}">
                            @csrf

                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                            <label for="name">Class Name
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('name')}}</span></span>
                                            </label>
                                            <input name="name" class="form-control" id="name" type="text"
                                                   placeholder="school name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('capacity')) ? 'has-error' : ''}}">
                                            <label for="capacity">Classroom Capacity
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('capacity')}}</span></span>
                                            </label>
                                            <input name="capacity" class="form-control" id="capacity" type="text"
                                                   placeholder="section setting capacity" value="{{ old('capacity') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('classroom')) ? 'has-error' : ''}}">
                                            <label for="classroom">Classroom Tag
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('classroom')}}</span></span>
                                            </label>
                                            <input name="classroom" class="form-control" id="classroom" type="text"
                                                   placeholder="class tag/room number" value="{{ old('classroom') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('syllabus_id')) ? 'has-error' : ''}}">
                                            <label for="syllabus_id">Class
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('syllabus_id')}}</span></span>
                                            </label>
                                            <select name="syllabus_id" class="form-control" id="syllabus_id" type="text">
                                                <option>Select class</option>
                                                @forelse($classes as $class)
                                                    <option {{ old('classes_id', request('class')) == $class->id ? "selected" : "" }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                @empty
                                                    <option>No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('form_teacher')) ? 'has-error' : ''}}">
                                            <label for="form_teacher">Form Teacher
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('form_teacher')}}</span></span>
                                            </label>
                                            <select name="form_teacher" class="form-control" id="form_teacher" type="text">
                                                <option>Select class</option>
                                                @forelse($formteachers as $teacher)
                                                    <option {{ old('form_teacher') == $teacher->id ? "selected" : "" }} value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
                                                @empty
                                                    <option>No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


