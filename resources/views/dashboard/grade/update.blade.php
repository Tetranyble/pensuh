@extends('dashboard.layouts.dashboard')
@section('title', 'Grades')
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
                <form method="POST" action="{{ route('grades.store' ) }}">
                    @csrf
                    @foreach($request as $key => $req)
                        <input type="hidden" name="{{ $key }}" value="{{ $req }}">
                    @endforeach
                    <input type="hidden" name="e" value="{{ $e }}">
                @forelse($grades as $key => $grade)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $grade->student->fullname }}</h4>

                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="id[]" value="{{ $grade->id }}">
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('resumption_test.'.$key)) ? 'has-error' : ''}}">
                                            <label for="resumption_test">Resumption Test
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('resumption_test.'. $key)}}</span></span>
                                            </label>
                                            <input name="resumption_test[]" class="form-control" id="resumption_test" type="number" min="0"
                                                   placeholder="resumption test" value="{{ in_array($grade->resumption_test, old('resumption_test', $grade->pluck('resumption_test')->toArray()) ?: []) ? $grade->resumption_test : old(`resumption_test.{$key}`) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('note')) ? 'has-error' : ''}}">
                                            <label for="note">Note Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('note')}}</span></span>
                                            </label>
                                            <input name="note[]" class="form-control" id="note" type="number" min="0"
                                                   placeholder="note score" value="{{ in_array($grade->note, old('note', $grade->pluck('note')->toArray()) ?: []) ? $grade->note : $grade->note }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('project')) ? 'has-error' : ''}}">
                                            <label for="project">Project Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('project')}}</span></span>
                                            </label>
                                            <input name="project[]" class="form-control" id="project" type="number" min="0"
                                                      placeholder="project score" value="{{ in_array($grade->project, old('project', $grade->pluck('project')->toArray()) ?: []) ? $grade->project : $grade->project }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('classwork')) ? 'has-error' : ''}}">
                                            <label for="classwork">Classwork Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('classwork')}}</span></span>
                                            </label>
                                            <input name="classwork[]" class="form-control" id="classwork" type="number" min="0"
                                                   placeholder="classwork score" value="{{ in_array($grade->classwork, old('classwork', $grade->pluck('classwork')->toArray()) ?: []) ? $grade->classwork : $grade->classwork }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('assignment')) ? 'has-error' : ''}}">
                                            <label for="assignment">Assignment Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('assignment')}}</span></span>
                                            </label>
                                            <input name="assignment[]" class="form-control" id="assignment" type="number" min="0"
                                                   placeholder="assignment score" value="{{in_array($grade->assignment, old('assignment', $grade->pluck('assignment')->toArray()) ?: []) ? $grade->assignment : $grade->assignment }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('midterm_test')) ? 'has-error' : ''}}">
                                            <label for="midterm_test">Midterm Test
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('midterm_test')}}</span></span>
                                            </label>
                                            <input name="midterm_test[]" class="form-control" id="midterm_test" type="number" min="0"
                                                   placeholder="midterm test score" value="{{ in_array($grade->midterm_test, old('midterm_test', $grade->pluck('midterm_test')->toArray()) ?: []) ? $grade->midterm_test : $grade->mideterm_test }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('attendance')) ? 'has-error' : ''}}">
                                            <label for="attendance">Attendance Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('attendance')}}</span></span>
                                            </label>
                                            <input name="attendance[]" class="form-control" id="attendance" type="number" min="0"
                                                   placeholder="attendance score" value="{{ in_array($grade->attendance, old('attendance', $grade->pluck('attendance')->toArray()) ?: []) ? $grade->attendance : $grade->attendance }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{($errors->has('exam')) ? 'has-error' : ''}}">
                                            <label for="exam">Exam Score
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('exam')}}</span></span>
                                            </label>
                                            <input name="exam[]" class="form-control" id="exam" type="number" min="0" max="100"
                                                   placeholder="classwork score" value="{{ in_array($grade->exam, old('exam',$grade->pluck('exam')->toArray()) ?: []) ? $grade->exam : $grade->exam }}">
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
                                <div class="form-group {{($errors->has('grade_system_name')) ? 'has-error' : ''}}">
                                    <label for="grade_system_name">Grade System
                                        <span class="text-danger"><span  class="text-danger h6">{{$errors->first('grade_system_name')}}</span></span>
                                    </label>
                                    <select name="grade_system_name" class="form-control" id="grade_system_name" type="text">
                                        <option value="">Select Grading System</option>
                                        @forelse($gradesystems as $gradesystem)
                                            <option {{  old('grade_system_name') == $gradesystem->name ? "selected" : "" }} value="{{ $gradesystem->name }}">{{ $gradesystem->name }}</option>
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


