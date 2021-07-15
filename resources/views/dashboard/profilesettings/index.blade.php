@extends('dashboard.layouts.dashboard')
@section('title', 'Profile Settings')
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
                        <h4 class="card-title">Password Reset</h4>
                        <form id="studentForm" action="{{ route('profilesettings.password', auth()->user()) }}" method="POST" >
                            @method('PATCH')
                            @csrf
                            <div class="form-body">
                            <div class="row">
                                <div class="offset-lg-4 offset-md-3 col-lg-3 col-md-6">
                                    <div class="form-group {{($errors->has('old-password')) ? 'is-invalid' : ''}}">
                                        <label for="old-password">Old Password
                                            <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('old-password')}}</span></span>
                                        </label>
                                        <input name="old-password" class="form-control" id="old-password" type="password" autocomplete="password" autofocus
                                               placeholder="enter your old password" value="{{ old('old-password') }}">
                                    </div>
                                </div>
                                <div class="offset-lg-4 offset-md-3 col-lg-3 col-md-6">
                                    <div class="form-group {{($errors->has('password')) ? 'is-invalid' : ''}}">
                                        <label for="password">Password
                                            <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('password')}}</span></span>
                                        </label>
                                        <input name="password" class="form-control" id="password" type="password" required autocomplete="new-password"
                                               placeholder="" value="{{ old('password') }}">
                                    </div>
                                </div>
                                <div class="offset-lg-4 offset-md-3 col-lg-3 col-md-6">
                                    <div class="form-group {{($errors->has('password_confirmation')) ? 'has-error' : ''}}">
                                        <label for="confirm-password">Confirm Password
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('password_confirmation')}}</span></span>
                                        </label>
                                        <input name="password_confirmation" class="form-control" id="confirm-password" type="password" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="offset-lg-4 offset-md-3 col-lg-3 col-md-6">
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    </div>
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
