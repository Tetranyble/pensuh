@extends('dashboard.layouts.dashboard')
@section('title', 'Staff Onboarding')
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
                        <h4 class="card-title">Staff's Bio</h4>
                        <form action="{{ route('staff.import') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">

                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="import">Import staff Excel File
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('import')}}</span></span>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="import" id="import">
                                                    <label class="custom-file-label" for="import"></label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <form id="staffForm" action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Staff Bio</h4>

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
                                                    <option {{ old('department_id') == $department->id ? "selected" : "" }} value="{{ $department->id }}">{{ $department->name }}</option>
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
                                                   placeholder="enter education qualification" value="{{ old('education') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('teaching')) ? 'has-error' : ''}}">
                                            <label for="teaching">Teaching
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('teaching')}}</span></span>
                                            </label>
                                            <input name="teaching" class="form-control" id="teaching" type="range"
                                                   value="{{ old('teaching',2) }}" max="100" step="2" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('family_support')) ? 'has-error' : ''}}">
                                            <label for="family_support">Family Support
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('family_support')}}</span></span>
                                            </label>
                                            <input name="family_support" class="form-control" id="family_support" type="range"
                                                   value="{{ old('family_support',2) }}" max="100" step="2" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('speaking')) ? 'has-error' : ''}}">
                                            <label for="speaking">Speaking
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('speaking')}}</span></span>
                                            </label>
                                            <input name="speaking" class="form-control" id="speaking" type="range"
                                                   value="{{ old('speaking',2) }}" max="100" step="2" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('children_well_being')) ? 'has-error' : ''}}">
                                            <label for="children_well_being">Children Well Being
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('children_well_being')}}</span></span>
                                            </label>
                                            <input name="children_well_being" class="form-control" id="children_well_being" type="range"
                                                   value="{{ old('children_well_being',2) }}" max="100" step="2" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('description')) ? 'has-error' : ''}}">
                                            <label for="description">Description
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('description')}}</span></span>
                                            </label>
                                            <textarea cols="1" rows="1" name="description" class="form-control" id="description" type="text"
                                                      placeholder="enter educational Background" >{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('experience')) ? 'has-error' : ''}}">
                                            <label for="experience">Experience
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('experience')}}</span></span>
                                            </label>

                                            <input name="experience" class="form-control" id="experience" type="text"
                                                   placeholder="enter experience" value="{{ old('experience') }}">
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
                                                        <input type="checkbox" {{ in_array($role->id, old('roles') ?: []) ? "checked" : "" }} name="roles[]" value="{{ $role->id }}"> {{ $role->name }}
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
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-danger">Ok. Lets get serious.</h4>
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        $(function() {
            jQuery(document).bind("keyup keydown", function(e){
                if(e.ctrlKey && e.keyCode == 80){
                    console.log('hello world')
                    var opt = {
                        margin: 0,
                        filename: 'teachersignupform.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 1 },
                        jsPDF: { unit: 'in', format: 'A4', orientation: 'portrait' }
                    };
                    html2pdf().from(document.getElementById('staffForm')).set(opt).save();
                }
            });

        });
    </script>
    @parent
@endsection
