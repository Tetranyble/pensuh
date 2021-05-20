@extends('dashboard.layouts.dashboard')
@section('title', 'New Gallery Image')
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
                        <h4 class="card-title">New Gallery Image</h4>
                        <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                            <label for="name">Name
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('name')}}</span></span>
                                            </label>
                                            <input name="name" class="form-control" id="name" type="text"
                                                   placeholder="enter course name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photo_x">Event Photo
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('photo_x')}}</span></span>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="photo_x" id="photo_x">
                                                    <label class="custom-file-label" for="photo_x"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group {{($errors->has('description')) ? 'has-error' : ''}}">
                                            <label for="description">Description
                                                <span class="text-danger"><span
                                                        class="text-danger h6">{{$errors->first('description')}}</span></span>
                                            </label>
                                            <textarea rows="5" cols="5" name="description" class="form-control" id="description" type="text"
                                                      placeholder="describe the event">{{ old('description') }}</textarea>
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

