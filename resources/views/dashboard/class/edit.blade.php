@extends('dashboard.layouts.dashboard')
@section('title', 'Edit class')
@section('dashboard')
  <div class="container-fluid">
      @include('components.flash-message')
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">{{ $class->name }}</h4>
                      <form method="POST" action="{{ route('class.update', $class->id) }}">
                          @method('PUT')
                          @csrf

                          <div class="form-body">
                              <div class="row">

                                  <div class="col-md-6">
                                      <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                          <label for="name">Class Name
                                              <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('name')}}</span></span>
                                          </label>
                                          <input name="name" class="form-control" id="name" type="text"
                                                 placeholder="school name" value="{{ old('name', $class->name) }}">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group {{($errors->has('age')) ? 'has-error' : ''}}">
                                          <label for="age">Class Age Bracket
                                              <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('age')}}</span></span>
                                          </label>
                                          <input name="age" class="form-control" id="age" type="text"
                                                 placeholder="class age bracket" value="{{ old('age', $class->age) }}">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group {{($errors->has('syllabus_id')) ? 'has-error' : ''}}">
                                          <label for="syllabus_id">Syllabus
                                              <span class="text-danger"><span  class="text-danger h6">{{$errors->first('syllabus_id')}}</span></span>
                                          </label>
                                          <select name="syllabus_id" class="form-control" id="syllabus_id" type="text">
                                              <option>Select Syllabus</option>
                                              @forelse($syllabi as $syllabus)
                                                  <option {{ old('syllabus_id', $class->syllabus_id) == $syllabus->id ? "selected" : "" }} value="{{ $syllabus->id }}">{{ $syllabus->name }}</option>
                                              @empty
                                                  <option>No data</option>
                                              @endforelse
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group {{($errors->has('description')) ? 'has-error' : ''}}">
                                          <label for="description">Class Description
                                              <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('description')}}</span></span>
                                          </label>
                                          <textarea name="description" class="form-control" id="description" type="text"
                                                    placeholder="class description" cols="1" rows="1">{{ old('description', $class->description) }}</textarea>
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


