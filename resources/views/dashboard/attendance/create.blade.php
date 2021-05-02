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

                                                @canany([ 'admin', 'principal','bursar', 'master'])
                                                    <option value="4">staff signin</option>
                                                    <option value="5">staff signout</option>
                                                @endcanany
                                                    @canany([ 'admin', 'principal','bursar', 'master', 'form_teacher'])
                                                        <option value="6">morning attendance</option>
                                                        <option value="7">afternoon attendance</option>
                                                    @endcanany
                                                    @canany([ 'admin', 'principal','bursar', 'master', 'form_teacher','teacher'])
                                                        <option value="8">class attendance</option>
                                                        <option value="1">examination Attendance</option>
                                                    @endcanany
                                                    @canany([ 'admin', 'principal','bursar', 'master', 'form_teacher','teacher','security'])
                                                        <option value="2">child safety (arrived)</option>
                                                        <option value="3">child safety (picked up)</option>

                                                    @endcanany
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('user')) ? 'has-error' : ''}}">
                                            <label for="user">User Identity Number
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('user')}}</span></span>
                                            </label>
                                            <input name="user" class="form-control" id="user_id" type="text"
                                                   placeholder="enter user id" value="{{ old('user') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('present')) ? 'has-error' : ''}}">
                                            <label for="present">Mark
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('present')}}</span></span>
                                            </label>
                                            <select name="present" class="form-control" id="present" type="text">
                                                <option>mark attendance</option>
                                                <option value="0">absent</option>
                                                <option value="1">present</option>
                                                <option value="1">pickup</option>
                                            </select>
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


