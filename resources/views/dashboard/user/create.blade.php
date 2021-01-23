@extends('dashboard.layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h4 class="card-title mt-5">Create New User</h4>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="mt-4" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf()
                           <div class="row">
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="name">Name</label>
                                       <input type="text" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                       @error('name')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="email">Email</label>
                                       <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email">
                                       @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="phone">Phone</label>
                                       <input type="number"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="email" id="phone">
                                       @error('phone')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="gender">Gender</label>
                                       <select  class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" id="gender">
                                           <option value="male">Male</option>
                                           <option value="female">Female</option>
                                           <option value="prefer not to say">Prefer not to say</option>
                                           <option value="transgender">Transgender</option>
                                       </select>
                                       @error('gender')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="blood_group">Blood Group</label>
                                       <select  class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" value="{{ old('blood_group') }}" required autocomplete="blood_group" id="blood_group">
                                           <option value="A+">A+</option>
                                           <option value="A-">A-</option>
                                           <option value="B+">B+</option>
                                           <option value="B-">B-</option>
                                           <option value="AB+">AB+</option>
                                           <option value="AB-">AB-</option>
                                           <option value="O+">O+</option>
                                           <option value="O-">O-</option>
                                       </select>
                                       @error('blood_group')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="nationality">Nationality</label>
                                       <input type="text"  class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required autocomplete="email" id="nationality">
                                       @error('nationality')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="address">Address</label>
                                       <input type="text"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="email" id="address">
                                       @error('address')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="photo">Profile Photo</label>
                                       <div class="custom-file">
                                           <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" id="photo">
                                           <label class="custom-file-label" for="photo">Choose file</label>
                                       </div>
                                       @error('photo')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>

                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="password">Password</label>
                                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                       @error('password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="password">Confirm Password</label>
                                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="role_id">User Role</label>
                                       <select  class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="{{ old('role_id') }}" required autocomplete="blood_group" id="role_id">
                                           @foreach($roles as $role)
                                               <option value="{{ $role->id }}">{{ $role->name }}</option>
                                               @endforeach
                                       </select>
                                       @error('blood_group')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group mb-4">
                                       <label for="about">About the Individual</label>
                                       <textarea type="text"  cols="1" rows="1" class="form-control @error('about') is-invalid @enderror" name="about" autocomplete="about" id="about">{{ old('about') }}</textarea>
                                       @error('about')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div id="student-record" class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="session">Session</label>
                                       <input type="text"  class="form-control @error('session') is-invalid @enderror" name="session" value="{{ old('session') }}" autocomplete="session" id="session">
                                       @error('session')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="group">Group</label>
                                       <input type="text"  class="form-control @error('group') is-invalid @enderror" name="group" autocomplete="group" id="group" value="{{ old('group') }}">
                                       @error('group')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="birthday">Birthday</label>
                                       <input type="date"  class="form-control @error('birthday') is-invalid @enderror" name="birthday" autocomplete="birthday" id="birthday" value="{{ old('birthday') }}">
                                       @error('birthday')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="religion">Religion</label>
                                       <input type="text"  class="form-control @error('religion') is-invalid @enderror" name="religion" autocomplete="religion" id="religion" value="{{ old('religion') }}">
                                       @error('religion')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="father_name">Father's Name</label>
                                       <input type="text"  class="form-control @error('father_name') is-invalid @enderror" name="father_name" autocomplete="father_name" id="father_name" value="{{ old('father_name') }}">
                                       @error('father_name')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="father_phone_number">Father's Phone Number</label>
                                       <input type="text"  class="form-control @error('father_phone_number') is-invalid @enderror" name="father_phone_number" autocomplete="father_phone_number" id="father_phone_number" value="{{ old('father_phone_number') }}">
                                       @error('father_phone_number')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="father_national_id">Father's National Identity</label>
                                       <input type="text"  class="form-control @error('father_national_id') is-invalid @enderror" name="father_national_id" autocomplete="father_national_id" id="father_national_id" value="{{ old('father_national_id') }}">
                                       @error('father_national_id')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="father_name">Father's Occupation</label>
                                       <input type="text"  class="form-control @error('father_occupation') is-invalid @enderror" name="father_occupation" autocomplete="father_occupation" id="father_occupation" value="{{ old('father_occupation') }}">
                                       @error('father_occupation')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="father_annual_income">Father's Annual Income</label>
                                       <input type="text"  class="form-control @error('father_annual_income') is-invalid @enderror" name="father_annual_income" autocomplete="father_annual_income" id="father_annual_income" value="{{ old('father_annual_income') }}">
                                       @error('father_annual_income')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="mother_name">Mother's Name</label>
                                       <input type="text"  class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" autocomplete="mother_name" id="mother_name" value="{{ old('mother_name') }}">
                                       @error('mother_name')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="mother_phone_number">Mother's Phone Number</label>
                                       <input type="text"  class="form-control @error('mother_phone_number') is-invalid @enderror" name="mother_phone_number" autocomplete="mother_phone_number" id="mother_phone_number" value="{{ old('mother_phone_number') }}">
                                       @error('mother_phone_number')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide" >
                                   <div class="form-group mb-4">
                                       <label for="mother_national_id">Mother's National Identity</label>
                                       <input type="text"  class="form-control @error('mother_national_id') is-invalid @enderror" name="mother_national_id" autocomplete="mother_national_id" id="mother_national_id" value="{{ old('mother_national_id') }}">
                                       @error('mother_national_id')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="mother_occupation">Mother's Occupation</label>
                                       <input type="text"  class="form-control @error('mother_occupation') is-invalid @enderror" name="mother_occupation" autocomplete="mother_occupation" id="mother_occupation" value="{{ old('mother_occupation') }}">
                                       @error('mother_occupation')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="mother_designation">Mother's Designation</label>
                                       <input type="text"  class="form-control @error('mother_designation') is-invalid @enderror" name="mother_designation" autocomplete="mother_designation" id="mother_designation" value="{{ old('mother_designation') }}">
                                       @error('mother_designation')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                               <div  class="col-lg-6 col-md-6 col-sm-12 d-none" data-js="hide">
                                   <div class="form-group mb-4">
                                       <label for="mother_annual_income">Mother's Annual Income</label>
                                       <input type="text"  class="form-control @error('mother_annual_income') is-invalid @enderror" name="mother_annual_income" autocomplete="mother_annual_income" id="mother_annual_income" value="{{ old('mother_annual_income') }}">
                                       @error('mother_annual_income')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                   </div>
                               </div>
                           </div>
                            <div class="row">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @section('create_page_js')
        <script>

            $(document).ready(function(){
                let info =  function(e = {}){
                    var str = $('#role_id').val();
                    if(str ==1){
                        $.each(document.querySelectorAll('[data-js="hide"]'), function(i, value){
                            $(value).removeClass('d-none').slideDown('slow')
                        })

                    }else{
                        $.each(document.querySelectorAll('[data-js="hide"]'), function(i, value){
                            $(value).removeClass('d-none').slideUp('slow')
                        })

                    }
                    // str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                    // $('#role_slug').val(str);
                    // $('#role_slug').attr('placeholder', str);
                }
                $('#role_id').on('change', function(e){
                    info(e)
                });

               info()
            });

        </script>
    @endsection
@endsection
