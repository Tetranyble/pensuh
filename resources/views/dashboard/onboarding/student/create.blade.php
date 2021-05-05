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
                                        <input name="email" class="form-control" id="email" type="email"
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
                                               placeholder="enter where you address" value="{{ old('address') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo_x">Your profile photo
                                            <span class="text-danger"><span  class="text-danger h6">{{$errors->first('photo_x')}}</span></span>
                                        </label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="photo_x" id="photo_x">
                                                <label class="custom-file-label" for="photo_x"></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('group_id')) ? 'has-error' : ''}}">
                                        <label for="group_id">Group
                                            <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('group_id')}}</span></span>
                                        </label>
                                        <select name="group_id" class="form-control" id="group_id" type="text">
                                            <option>select a group</option>
                                            @forelse($groups as $group)
                                                <option {{ old('group_id') == $group->id ? "selected" : "" }} value="{{ $group->id }}">{{ $group->name }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('religion_id')) ? 'has-error' : ''}}">
                                        <label for="religion_id">Religious view
                                            <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('religion_id')}}</span></span>
                                        </label>
                                        <select name="religion_id" class="form-control" id="religion_id" type="text">
                                            <option>select religion</option>
                                            @forelse($religions as $religion)
                                                <option {{ old('religion_id') == $religion->id ? "selected" : "" }} value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('school_type_id')) ? 'has-error' : ''}}">
                                        <label for="school_type_id">School type
                                            <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('school_type_id')}}</span></span>
                                        </label>
                                        <select name="school_type_id" class="form-control" id="school_type_id" type="text">
                                            <option>select school type</option>
                                            @forelse($schools as $school)
                                                <option {{ old('school_type_id') == $school->id ? "selected" : "" }} value="{{ $school->id }}">{{ $school->name }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('section_id')) ? 'has-error' : ''}}">
                                        <label for="section_id">Class
                                            <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('section_id')}}</span></span>
                                        </label>
                                        <select name="section_id" class="form-control" id="section_id" type="text">
                                            <option>select class</option>
                                            @forelse($sections as $section)
                                                <option {{ old('section_id') == $section->id ? "selected" : "" }} value="{{ $section->id }}">{{ $section->classes->name . ' / ' . $section->name }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{($errors->has('session_id')) ? 'has-error' : ''}}">
                                        <label for="session_id">Academic session
                                            <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('session_id')}}</span></span>
                                        </label>
                                        <select name="session_id" class="form-control" id="session_id" type="text">
                                            <option>academic session</option>
                                            @forelse($sessions as $session)
                                                <option {{ old('session_id') == $session->id ? "selected" : "" }} value="{{ $session->id }}">{{ $session->name }}</option>
                                            @empty
                                                <option>No data</option>
                                            @endforelse
                                        </select>
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
                            <h2 class="card-title">Parents/Guardian</h2>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('father_name')) ? 'has-error' : ''}}">
                                                <label for="father_name">Father Name
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('father_name')}}</span></span>
                                                </label>
                                                <input name="father_name" class="form-control" id="father_name" type="text"
                                                       placeholder="enter father's name" value="{{ old('father_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('father_phone_number')) ? 'has-error' : ''}}">
                                                <label for="father_phone_number">Father Phone
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('father_phone_number')}}</span></span>
                                                </label>
                                                <input name="father_phone_number" class="form-control" id="father_phone_number" type="text"
                                                       placeholder="enter father's phone number" value="{{ old('father_phone_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('father_email')) ? 'has-error' : ''}}">
                                                <label for="father_email">Father Email
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('father_email')}}</span></span>
                                                </label>
                                                <input name="father_email" class="form-control" id="father_email" type="text"
                                                       placeholder="enter father's email" value="{{ old('father_email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('father_naional_id')) ? 'has-error' : ''}}">
                                                <label for="father_naional_id">Father National ID
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('father_naional_id')}}</span></span>
                                                </label>
                                                <input name="father_naional_id" class="form-control" id="father_naional_id" type="text"
                                                       placeholder="enter father's national id" value="{{ old('father_naional_id') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('father_occupation')) ? 'has-error' : ''}}">
                                                <label for="father_occupation">Father Occupation
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('father_occupation')}}</span></span>
                                                </label>
                                                <input name="father_occupation" class="form-control" id="father_occupation" type="text"
                                                       placeholder="enter father's occupation" value="{{ old('father_occupation') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('father_designation')) ? 'has-error' : ''}}">
                                                <label for="father_designation">Father Designation
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('father_designation')}}</span></span>
                                                </label>
                                                <input name="father_designation" class="form-control" id="father_designation" type="text"
                                                       placeholder="enter father's designation" value="{{ old('father_designation') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('father_annual_income')) ? 'has-error' : ''}}">
                                                <label for="father_annual_income">Father Annual Income
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('father_annual_income')}}</span></span>
                                                </label>
                                                <input name="father_annual_income" class="form-control" id="father_annual_income" type="text"
                                                       placeholder="enter father's annual income" value="{{ old('father_annual_income') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('mother_name')) ? 'has-error' : ''}}">
                                                <label for="mother_name">Mother Name
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('mother_name')}}</span></span>
                                                </label>
                                                <input name="mother_name" class="form-control" id="mother_name" type="text"
                                                       placeholder="enter mother's name" value="{{ old('mother_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('mother_phone_number')) ? 'has-error' : ''}}">
                                                <label for="mother_phone_number">Mother Phone
                                                    <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('mother_phone_number')}}</span></span>
                                                </label>
                                                <input name="mother_phone_number" class="form-control" id="mother_phone_number" type="text"
                                                       placeholder="enter mother's phone number" value="{{ old('mother_phone_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('mother_email')) ? 'has-error' : ''}}">
                                                <label for="mother_email">Mother Email
                                                    <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('mother_email')}}</span></span>
                                                </label>
                                                <input name="mother_email" class="form-control" id="mother_email" type="text"
                                                       placeholder="enter mother's email" value="{{ old('mother_email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('mother_naional_id')) ? 'has-error' : ''}}">
                                                <label for="mother_naional_id">Mother National ID
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('mother_naional_id')}}</span></span>
                                                </label>
                                                <input name="mother_naional_id" class="form-control" id="mother_naional_id" type="text"
                                                       placeholder="enter mother's national id" value="{{ old('mother_naional_id') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('mother_occupation')) ? 'has-error' : ''}}">
                                                <label for="mother_occupation">Father Occupation
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('mother_occupation')}}</span></span>
                                                </label>
                                                <input name="mother_occupation" class="form-control" id="mother_occupation" type="text"
                                                       placeholder="enter mother's occupation" value="{{ old('mother_occupation') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('mother_designation')) ? 'has-error' : ''}}">
                                                <label for="mother_designation">Father Designation
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('mother_designation')}}</span></span>
                                                </label>
                                                <input name="mother_designation" class="form-control" id="father_designation" type="text"
                                                       placeholder="enter mother's designation" value="{{ old('mother_designation') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{($errors->has('mother_annual_income')) ? 'has-error' : ''}}">
                                                <label for="mother_annual_income">Father Annual Income
                                                    <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('mother_annual_income')}}</span></span>
                                                </label>
                                                <input name="mother_annual_income" class="form-control" id="mother_annual_income" type="text"
                                                       placeholder="enter mother's annual income" value="{{ old('mother_annual_income') }}">
                                            </div>
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
                                        <div class="form-group {{($errors->has('pass')) ? 'has-error' : ''}}">
                                            <label for="pass">Password
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('pass')}}</span></span>
                                            </label>
                                            <input placeholder="enter password" id="pass" type="password" class="form-control" name="pass" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="pass-confirm">Confirm Password
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('pass_confirmation')}}</span></span>
                                            </label>
                                            <input placeholder="confirm password" id="pass-confirm" type="password" class="form-control" name="pass_confirmation" required autocomplete="new-password">
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

