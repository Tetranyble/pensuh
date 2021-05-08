@extends('dashboard.layouts.dashboard')
@section('title', 'Staff info update')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <ul>
            @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
            @endforeach
        </ul>
        <div class="row">
            <form action="{{ route('staff.update', $user) }}" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Staff Bio</h4>
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('firstname')) ? 'has-error' : ''}}">
                                            <label for="firstname">First Name
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('firstname')}}</span></span>
                                            </label>
                                            <input name="firstname" class="form-control" id="firstname" type="text"
                                                   placeholder="enter your firstname" value="{{ old('firstname', $user->firstname) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('middlename')) ? 'has-error' : ''}}">
                                            <label for="middlename">Middle Name
                                                <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('middlename')}}</span></span>
                                            </label>
                                            <input name="middlename" class="form-control" id="middlename" type="text"
                                                   placeholder="enter your middle name" value="{{ old('middlename', $user->middlename) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('lastname')) ? 'has-error' : ''}}">
                                            <label for="lastname">Last Name
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('lastname')}}</span></span>
                                            </label>
                                            <input name="lastname" class="form-control" id="lastname" type="text"
                                                   placeholder="enter your lastname" value="{{ old('lastname', $user->lastname) }}">
                                        </div>
                                    </div>
                                    {{--                                        added for brevity--}}
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                                            <label for="email">Email
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                            </label>
                                            <input name="email" class="form-control" id="email" type="email"
                                                   placeholder="enter your school email" value="{{ old('email', $user->email) }}">
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
                                                    <option {{ old('nationality_id', $user->nationality_id) == $nationality->id ? "selected" : "" }} value="{{ $nationality->id }}">{{ $nationality->name }}</option>
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
                                                    <option {{ old('blood_group_id', $user->blood->id) == $blood->id ? "selected" : "" }} value="{{ $blood->id }}">{{ $blood->name }}</option>
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
                                                    <option {{ old('gender_id', $user->gender->id) == $gender->id ? "selected" : "" }} value="{{ $gender->id }}">{{ $gender->name }}</option>
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
                                                   placeholder="enter your mobile number" value="{{ old('phone', $user->phone) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('date_of_birth')) ? 'has-error' : ''}}">
                                            <label for="date_of_birth">Date of Birth
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('date_of_birth')}}</span></span>
                                            </label>
                                            <input name="date_of_birth" class="form-control" id="date_of_birth" type="date"
                                                   placeholder="enter your date of birth" value="{{ old('date_of_birth', $user->date_of_birth->format('Y-m-d') ) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('about')) ? 'has-error' : ''}}">
                                            <label for="about">Your Headline
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('about')}}</span></span>
                                            </label>
                                            <input name="about" class="form-control" id="about" type="text"
                                                   placeholder="tell us about yourself" value="{{ old('about', $user->about) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('address')) ? 'has-error' : ''}}">
                                            <label for="address">Address
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('address')}}</span></span>
                                            </label>
                                            <input name="address" class="form-control" id="address" type="text"
                                                   placeholder="enter where you address" value="{{ old('address', $user->address) }}">
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
                                        <div class="form-group {{($errors->has('religion_id')) ? 'has-error' : ''}}">
                                            <label for="religion_id">Religious view
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('religion_id')}}</span></span>
                                            </label>
                                            <select name="religion_id" class="form-control" id="religion_id" type="text">
                                                <option>select religion</option>
                                                @forelse($religions as $religion)
                                                    <option {{ old('religion_id', $user->religion_id) == $religion->id ? "selected" : "" }} value="{{ $religion->id }}">{{ $religion->name }}</option>
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
                                                    <option {{ old('school_type_id', $user->teacherQualification->school_type_id) == $school->id ? "selected" : "" }} value="{{ $school->id }}">{{ $school->name }}</option>
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
                            <h4 class="card-title">We're Social Too. Let's Connect</h4>
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
                                                   placeholder="enter your twitter handle" value="{{ old('twitter', $user->twitter) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('facebook')) ? 'has-error' : ''}}">
                                            <label for="facebook">Facebook
                                                <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('facebook')}}</span></span>
                                            </label>
                                            <input name="facebook" class="form-control" id="facebook" type="text"
                                                   placeholder="enter your facebook handle" value="{{ old('facebook', $user->facebook) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('linkedin')) ? 'has-error' : ''}}">
                                            <label for="linkedin">LinkedIn
                                                <span class="text-danger"> *(optional)<span  class="text-danger h6">{{$errors->first('linkedin')}}</span></span>
                                            </label>
                                            <input name="linkedin" class="form-control" id="linkedin" type="text"
                                                   placeholder="enter your linkedin handle" value="{{ old('linkedin', $user->linkedin) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('instagram')) ? 'has-error' : ''}}">
                                            <label for="instagram">Instagram
                                                <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('instagram')}}</span></span>
                                            </label>
                                            <input name="instagram" class="form-control" id="instagram" type="text"
                                                   placeholder="enter your instagram handle" value="{{ old('instagram', $user->instagram) }}">
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
                            <h4 class="card-title">Qualification</h4>
                            <p></p>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('department_id')) ? 'has-error' : ''}}">
                                            <label for="department_id">Department
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('department_id')}}</span></span>
                                            </label>
                                            <select name="department_id" class="form-control" id="department_id" type="text">
                                                <option>select department</option>
                                                @forelse($departments as $department)
                                                    <option {{ old('department_id', $user->teacherQualification->department_id) == $department->id ? "selected" : "" }} value="{{ $department->id }}">{{ $department->name }}</option>
                                                @empty
                                                    <option>No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('education')) ? 'has-error' : ''}}">
                                            <label for="education">Education
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('education')}}</span></span>
                                            </label>
                                            <input name="education" class="form-control" id="education" type="text"
                                                   placeholder="enter education qualification" value="{{ old('education', $user->teacherQualification->education) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('teaching')) ? 'has-error' : ''}}">
                                            <label for="teaching">Teaching
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('teaching')}}</span></span>
                                            </label>
                                            <input name="teaching" class="form-control" id="teaching" type="range"
                                                   value="{{ old('teaching',$user->teacherQualification->teaching) }}" max="100" step="2" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('family_support')) ? 'has-error' : ''}}">
                                            <label for="family_support">Family Support
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('family_support')}}</span></span>
                                            </label>
                                            <input name="family_support" class="form-control" id="family_support" type="range"
                                                   value="{{ old('family_support', $user->teacherQualification->family_support) }}" max="100" step="2" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('speaking')) ? 'has-error' : ''}}">
                                            <label for="speaking">Speaking
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('speaking')}}</span></span>
                                            </label>
                                            <input name="speaking" class="form-control" id="speaking" type="range"
                                                   value="{{ old('speaking', $user->teacherQualification->speaking) }}" max="100" step="2" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('children_well_being')) ? 'has-error' : ''}}">
                                            <label for="children_well_being">Children Well Being
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('children_well_being')}}</span></span>
                                            </label>
                                            <input name="children_well_being" class="form-control" id="children_well_being" type="range"
                                                   value="{{ old('children_well_being', $user->teacherQualification->children_well_being) }}" max="100" step="2" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('description')) ? 'has-error' : ''}}">
                                            <label for="description">Description
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('description')}}</span></span>
                                            </label>
                                            <textarea cols="1" rows="1" name="description" class="form-control" id="description" type="text"
                                                      placeholder="enter educational Background" >{{ old('description', $user->teacherQualification->description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('experience')) ? 'has-error' : ''}}">
                                            <label for="experience">Experience
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('experience')}}</span></span>
                                            </label>

                                            <input name="experience" class="form-control" id="experience" type="text"
                                                   placeholder="enter experience" value="{{ old('experience', $user->teacherQualification->experience) }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @canany(['bursar', 'teacher','form_teacher', 'librarian', 'security'])
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Update</button>

                                </div>
                            </div>
                                @endcanany
                        </div>
                    </div>
                </div>
                @canany(['master', 'admin', 'principal'])
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-danger">User Role/Permission</h4>
                            <p class="text-warning">Careful of the roles</p>
                            <div class="form-body">
                                <div class="row">
                                    @forelse($roles as $role)
                                        @if($role->name != 'master')
                                            <div class="col-md-6">
                                                <div class="form-group {{($errors->has('roles')) ? 'has-error' : ''}}">
                                                    <fieldset class="checkbox">
                                                        <label>
                                                            <input type="checkbox" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()) ?: []) ? "checked" : "" }} name="roles[]" value="{{ $role->id }}"> {{ $role->name }}
                                                        </label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        @endif
                                    @empty
                                        <p>no roles</p>
                                    @endforelse

                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Update</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               @endcanany
            </form>
        </div>
    </div>
@endsection

