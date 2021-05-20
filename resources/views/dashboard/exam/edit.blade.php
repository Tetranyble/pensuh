@extends('dashboard.layouts.dashboard')
@section('title', 'Edit Exam')
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
                        <h4 class="card-title">Now editing {{ $exam->name }}</h4>
                        <form method="POST" action="{{ route('exams.update', $exam) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                            <label for="name">Name
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('name')}}</span></span>
                                            </label>
                                            <input name="name" class="form-control" id="name" type="text"
                                                   placeholder="enter course name" value="{{ old('name', $exam->name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('start')) ? 'has-error' : ''}}">
                                            <label for="start">Start Date
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('start')}}</span></span>
                                            </label>
                                            <input name="start" class="form-control" id="start" type="date"
                                                   placeholder="enter exam start date" value="{{ old('start', $exam->start) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('end')) ? 'has-error' : ''}}">
                                            <label for="end">End Date
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('end')}}</span></span>
                                            </label>
                                            <input name="end" class="form-control" id="end" type="date"
                                                   placeholder="enter end date" value="{{ old('end', $exam->end) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('academic_calendar_id')) ? 'has-error' : ''}}">
                                            <label for="academic_calendar_id">Academic Calendar
                                                <span class="text-danger"><span
                                                        class="text-danger h6">{{$errors->first('academic_calendar_id')}}</span></span>
                                            </label>
                                            <select name="academic_calendar_id" class="form-control" id="academic_calendar_id" type="text">
                                                <option value="">select academic calendar</option>
                                                @forelse($calendars as $calendar)
                                                    <option
                                                        {{ old('academic_calendar_id', $exam->academic_calendar_id) == $calendar->id ? "selected" : "" }} value="{{ $calendar->id }}">{{ $calendar->name }}</option>
                                                @empty
                                                    <option value="">No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Update</button>

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

