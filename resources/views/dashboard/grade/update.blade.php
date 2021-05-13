@extends('dashboard.layouts.dashboard')
@section('title', 'Grades')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('grades.store' ) }}">
                    @csrf
                    @foreach($request as $key => $req)
                        <input type="hidden" name="{{ $key }}" value="{{ $req }}">
                    @endforeach
                @forelse($grades as $key => $grade)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $grade->student->fullname }}</h4>

                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="id[]" value="{{ $grade->id }}">
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('resumption_test')) ? 'has-error' : ''}}">
                                            <label for="resumption_test">Resumption Test
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('resumption_test')}}</span></span>
                                            </label>
                                            <input name="resumption_test[]" class="form-control" id="resumption_test" type="number"
                                                   placeholder="resumption Test" value="{{ old('resumption_test', $grade->resumption_test) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('note')) ? 'has-error' : ''}}">
                                            <label for="note">Note Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('note')}}</span></span>
                                            </label>
                                            <input name="note[]" class="form-control" id="note" type="number"
                                                   placeholder="note score" value="{{ old('note', $grade->note) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('project')) ? 'has-error' : ''}}">
                                            <label for="project">Project Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('project')}}</span></span>
                                            </label>
                                            <input name="project[]" class="form-control" id="project" type="number"
                                                      placeholder="project score" value="{{ old('project', $grade->project) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('classwork')) ? 'has-error' : ''}}">
                                            <label for="classwork">Classwork Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('classwork')}}</span></span>
                                            </label>
                                            <input name="classwork[]" class="form-control" id="classwork" type="number"
                                                   placeholder="classwork score" value="{{ old('classwork', $grade->classwork) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('assignment')) ? 'has-error' : ''}}">
                                            <label for="assignment">Assignment Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('assignment')}}</span></span>
                                            </label>
                                            <input name="assignment[]" class="form-control" id="assignment" type="number"
                                                   placeholder="assignment score" value="{{ old('assignment', $grade->assignment) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('midterm_test')) ? 'has-error' : ''}}">
                                            <label for="midterm_test">Midterm Test
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('midterm_test')}}</span></span>
                                            </label>
                                            <input name="midterm_test[]" class="form-control" id="midterm_test" type="number"
                                                   placeholder="midterm test score" value="{{ old('midterm_test', $grade->midterm_test) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('attendance')) ? 'has-error' : ''}}">
                                            <label for="attendance">Classwork Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('attendance')}}</span></span>
                                            </label>
                                            <input name="attendance[]" class="form-control" id="attendance" type="number"
                                                   placeholder="attendance score" value="{{ old('attendance', $grade->attendance) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('exam')) ? 'has-error' : ''}}">
                                            <label for="exam">Exam Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('exam')}}</span></span>
                                            </label>
                                            <input name="exam[]" class="form-control" id="exam" type="number"
                                                   placeholder="classwork score" value="{{ old('exam', $grade->exam) }}">
                                        </div>
                                    </div>

                                </div>

                            </div>
                    </div>
                </div>


                    @empty
                    <p>no grade</p>
                @endforelse
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="form-group {{($errors->has('syllabus_id')) ? 'has-error' : ''}}">
                                    <label for="grade_system_name">Syllabus
                                        <span class="text-danger"><span  class="text-danger h6">{{$errors->first('syllabus_id')}}</span></span>
                                    </label>
                                    <select name="grade_system_name" class="form-control" id="grade_system_name" type="text">
                                        <option>Select Grading System</option>
                                        @forelse($gradesystems as $gradesystem)
                                            <option {{ old('grade_system_name') == $gradesystem->id ? "selected" : "" }} value="{{ $gradesystem->name }}">{{ $gradesystem->name }}</option>
                                        @empty
                                            <option>No data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


