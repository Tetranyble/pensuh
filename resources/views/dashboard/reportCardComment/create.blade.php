@extends('dashboard.layouts.dashboard')
@section('title', 'New Report Card Comment')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        @foreach($errors->all() as $message)
            <li class="text-danger">{{ $message }}</li>
        @endforeach
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Report Card Comment</h4>
                        <div class="d-flex pt-3">
                            <p class="text-warning">Commenting as {{ request('role') }}</p>
                        </div>
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ request('student') }}">
                            <input type="hidden" name="report_card_id" value="{{ request('report') }}">
                            <input type="hidden" name="role" value="{{ request('role') }}">
                            <input type="hidden" name="redirect" value="{{ url()->previous() }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {{($errors->has('comment')) ? 'has-error' : ''}}">
                                            <label for="comment">Comment
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('comment')}}</span></span>
                                            </label>
                                            <textarea cols="5" rows="5" name="comment" class="form-control" id="comment" type="text"
                                                      placeholder="enter your comment" >{{ old('comment') }}</textarea>
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


