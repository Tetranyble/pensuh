@extends('dashboard.layouts.dashboard')
@section('title', 'Student Onboarding')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <ul>
            @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
            @endforeach
        </ul>
        <div class="row">
            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Student's Bio</h2>

                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('firstname')) ? 'has-error' : ''}}">
                                        <label for="firstname">First Name
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('firstname')}}</span></span>
                                        </label>
                                        <input name="firstname" class="form-control" id="firstname" type="text"
                                               placeholder="enter your firstname" value="{{ old('firstname') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('middlename')) ? 'has-error' : ''}}">
                                        <label for="middlename">Middle Name
                                            <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('middlename')}}</span></span>
                                        </label>
                                        <input name="middlename" class="form-control" id="middlename" type="text"
                                               placeholder="enter your middle name" value="{{ old('middlename') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('lastname')) ? 'has-error' : ''}}">
                                        <label for="lastname">Last Name
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('lastname')}}</span></span>
                                        </label>
                                        <input name="lastname" class="form-control" id="lastname" type="text"
                                               placeholder="enter your lastname" value="{{ old('lastname') }}">
                                    </div>
                                </div>
                                {{--                                        added for brevity--}}
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                                        <label for="email">Email
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                        </label>
                                        <input name="email" class="form-control" id="email" type="text"
                                               placeholder="enter your school email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('nationality_id')) ? 'has-error' : ''}}">
                                        <label for="nationality">Nationality
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('nationality_id')}}</span></span>
                                        </label>
                                        <select name="nationality_id" class="form-control" id="nationality_id" type="text">
                                            <option>Nationality</option>
                                            @forelse($nationalities as $nationality)
                                                <option {{ old('nationality_id') == $nationality->id ? "selected" : "" }} value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('blood_group_id')) ? 'has-error' : ''}}">
                                        <label for="blood_group_id">Blood Group
                                            <span class="text-danger"><span  class="text-danger h6">{{$errors->first('blood_group_id')}}</span></span>
                                        </label>
                                        <select name="blood_group_id" class="form-control" id="blood_group_id" type="text">
                                            <option>Blood Group</option>
                                            @forelse($bloods as $blood)
                                                <option {{ old('blood_group_id') == $blood->id ? "selected" : "" }} value="{{ $blood->id }}">{{ $blood->name }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('gender_id')) ? 'has-error' : ''}}">
                                        <label for="gender_id">Gender
                                            <span class="text-danger"><span  class="text-danger h6">{{$errors->first('gender_id')}}</span></span>
                                        </label>
                                        <select name="gender_id" class="form-control" id="gender_id" type="text">
                                            @forelse($genders as $gender)
                                                <option {{ old('gender_id') == $gender->id ? "selected" : "" }} value="{{ $gender->id }}">{{ $gender->name }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('phone')) ? 'has-error' : ''}}">
                                        <label for="phone">Phone
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('phone')}}</span></span>
                                        </label>
                                        <input name="phone" class="form-control" id="phone" type="text"
                                               placeholder="enter your mobile number" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('date_of_birth')) ? 'has-error' : ''}}">
                                        <label for="date_of_birth">Date of Birth
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('date_of_birth')}}</span></span>
                                        </label>
                                        <input name="date_of_birth" class="form-control" id="date_of_birth" type="date"
                                               placeholder="enter your date of birth" value="{{ old('date_of_birth') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('about')) ? 'has-error' : ''}}">
                                        <label for="about">Your Headline
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('about')}}</span></span>
                                        </label>
                                        <input name="about" class="form-control" id="about" type="text"
                                               placeholder="tell us about yourself" value="{{ old('about') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('address')) ? 'has-error' : ''}}">
                                        <label for="address">Address
                                            <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('address')}}</span></span>
                                        </label>
                                        <input name="address" class="form-control" id="address" type="text"
                                               placeholder="enter where you address" value="{{ old('about') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Your profile photo
                                            <span class="text-danger"><span  class="text-danger h6">{{$errors->first('image')}}</span></span>
                                        </label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="image"></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
                <br>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">We're Social Too. Let's Connect</h2>
                            <p>Please provide full url</p>
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('twitter')) ? 'has-error' : ''}}">
                                            <label for="twitter">Twitter
                                                <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('twitter')}}</span></span>
                                            </label>
                                            <input name="twitter" class="form-control" id="twitter" type="text"
                                                   placeholder="enter your twitter handle" value="{{ old('twitter') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('facebook')) ? 'has-error' : ''}}">
                                            <label for="facebook">Facebook
                                                <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('facebook')}}</span></span>
                                            </label>
                                            <input name="facebook" class="form-control" id="facebook" type="text"
                                                   placeholder="enter your facebook handle" value="{{ old('facebook') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('linkedin')) ? 'has-error' : ''}}">
                                            <label for="linkedin">LinkedIn
                                                <span class="text-danger"> *(optional)<span  class="text-danger h6">{{$errors->first('linkedin')}}</span></span>
                                            </label>
                                            <input name="linkedin" class="form-control" id="linkedin" type="text"
                                                   placeholder="enter your linkedin handle" value="{{ old('linkedin') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('instagram')) ? 'has-error' : ''}}">
                                            <label for="instagram">Instagram
                                                <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('instagram')}}</span></span>
                                            </label>
                                            <input name="instagram" class="form-control" id="instagram" type="text"
                                                   placeholder="enter your instagram handle" value="{{ old('instagram') }}">
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
                            <h2 class="card-title text-danger">Ok. Lets get serious.</h2>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('password')) ? 'has-error' : ''}}">
                                            <label for="password">Password
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('password')}}</span></span>
                                            </label>
                                            <input placeholder="enter password" id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="password-confirm">Confirm Password
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('facebook')}}</span></span>
                                            </label>
                                            <input placeholder="confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

