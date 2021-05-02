@extends('dashboard.layouts.dashboard')
@section('title', 'Create new course')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        @foreach($errors->all() as $message)
            <li class="text-danger">{{ $message }}</li>
        @endforeach
        <div class="row">
            <form method="POST" action="{{ route('course.store', ['section' => request('section')]) }}" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create New Course</h4>
                            @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                            <label for="name">Course Name
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('name')}}</span></span>
                                            </label>
                                            <input name="name" class="form-control" id="name" type="text"
                                                   placeholder="enter course name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('duration')) ? 'has-error' : ''}}">
                                            <label for="duration">Course Duration
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('duration')}}</span></span>
                                            </label>
                                            <input name="duration" class="form-control" id="duration" type="text"
                                                   placeholder="enter course duration" value="{{ old('duration') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('section_id')) ? 'has-error' : ''}}">
                                            <label for="section_id">Section
                                                <span class="text-danger"><span
                                                        class="text-danger h6">{{$errors->first('section_id')}}</span></span>
                                            </label>
                                            <select name="section_id" class="form-control" id="section_id" type="text">
                                                <option>select class section</option>
                                                @forelse($sections as $section)
                                                    <option
                                                        {{ old('section_id', request('section')) == $section->id ? "selected" : "" }} value="{{ $section->id }}">{{ $section->classes->name .' / '.$section->name }}</option>
                                                @empty
                                                    <option>No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('course_type_id')) ? 'has-error' : ''}}">
                                            <label for="course_type_id">Course Type
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('course_type_id')}}</span></span>
                                            </label>
                                            <select name="course_type_id" class="form-control" id="course_type_id"
                                                    type="text">
                                                <option>select course type</option>
                                                @forelse($courseTypes as $type)
                                                    <option
                                                        {{ old('course_type_id') == $type->id ? "selected" : "" }} value="{{ $type->id }}">{{ $type->name }}</option>
                                                @empty
                                                    <option>No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="banner_x">Banner
                                                <span class="text-danger">1919*700 (optional)<span
                                                        class="text-danger h6">{{$errors->first('banner_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="banner_x" type="file" class="custom-file-input"
                                                       id="banner_x">
                                                <label class="custom-file-label" for="banner_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photo_x">Photo
                                                <span class="text-danger">800*533 (required)<span
                                                        class="text-danger h6">{{$errors->first('photo_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="photo_x" type="file" class="custom-file-input"
                                                       id="photo_x">
                                                <label class="custom-file-label" for="photo_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Time Table/Teacher</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('schedule_id')) ? 'has-error' : ''}}">
                                        <label for="schedule_id">Schedule/Time Table
                                            <span class="text-danger"><span
                                                    class="text-danger h6">{{$errors->first('schedule_id')}}</span></span>
                                        </label>
                                        <select multiple name="schedule_id[]" class="form-control" id="schedule_id"
                                                type="text">
                                            <option>select schedule/time table</option>
                                            @forelse($schedules as $schedule)
                                                <option
                                                    {{ in_array($schedule->id,old('schedule_id') ?: []) ? "selected" : "" }} value="{{ $schedule->id }}">{{ $schedule->day. '/' . $schedule->start. '/' . $schedule->end }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('teacher')) ? 'has-error' : ''}}">
                                        <label for="teacher">Teacher
                                            <span class="text-danger">*<span
                                                    class="text-danger h6">{{$errors->first('teacher')}}</span></span>
                                        </label>
                                        <select multiple name="teacher[]" class="form-control" id="teacher" type="text">
                                            <option>select course teacher</option>
                                            @forelse($teachers as $teacher)
                                                <option
                                                    {{ in_array($teacher->id, old('teacher') ?: []) ? "selected" : "" }} value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Time Table/Teacher</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{($errors->has('body')) ? 'has-error' : ''}}">
                                        <label for="body">Course Description
                                            <span class="text-danger">*<span
                                                    class="text-danger h6">{{$errors->first('body')}}</span></span>
                                        </label>
                                        <textarea cols="5" rows="5" name="body" class="form-control" id="body"
                                                  type="text"
                                                  placeholder="enter course description">{{ old('body') }}</textarea>
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

                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('script')
    @parent
@endsection

