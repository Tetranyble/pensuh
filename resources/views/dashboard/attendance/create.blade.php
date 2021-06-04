@extends('dashboard.layouts.dashboard')
@section('title', 'New class')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Take Attendance / Pick up</h4>
                        <form method="POST" action="{{ route('attendances.store') }}">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('attendance_type_id')) ? 'has-error' : ''}}">
                                            <label for="attendance_type_id">Attendance Type
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('attendance_type_id')}}</span></span>
                                            </label>
                                            <select name="attendance_type_id" class="form-control" id="attendance_type_id" type="text">
                                                @forelse($attendanceTypes as $attendance)
                                                    <option value="{{ $attendance->id }}">{{ $attendance->name }}</option>
                                                @empty
                                                    <option value="">No Attendance Data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('user_id')) ? 'has-error' : ''}}">
                                            <label for="user_id">User Identity Number
                                                <span class="text-danger">*<span class="text-danger h6">{{$errors->first('user_id')}}</span></span>
                                            </label>
                                            <input name="user_id" class="form-control" id="user_id" type="number"
                                                   placeholder="enter user code" value="{{ old('user_id') }}">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Mark</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


