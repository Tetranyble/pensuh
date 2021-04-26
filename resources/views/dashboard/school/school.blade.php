@extends('dashboard.layouts.dashboard')
@section('title', 'School')
@section('dashboard')
    <link href="{{ asset('../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <br>
    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
        <section class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Let's Meet You</h2>
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_name')) ? 'has-error' : ''}}">
                                            <label for="school_name">School Name
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('school_name')}}</span></span>
                                            </label>
                                            <input name="school_name" class="form-control" id="school_name" type="text"
                                                   placeholder="school name abbreviation" value="{{ old('school_name', $school->school_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('established')) ? 'has-error' : ''}}">
                                            <label for="established">Established Year
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('established')}}</span></span>
                                            </label>
                                            <input name="established" class="form-control" id="established" type="text"
                                                   placeholder="enter school established year" value="{{ old('established', $school->established) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('language_id')) ? 'has-error' : ''}}">
                                            <label for="language_id">Official Language
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('language_id')}}</span></span>
                                            </label>
                                            <select name="language_id" class="form-control" id="language_id" type="text">
                                                <option>Teaching/Learning Language</option>
                                                @forelse($languages as $language)
                                                    <option {{ old('language_id') == $language->id ? "selected" : "" }} value="{{ $language->id }}">{{ $language->name }}</option>
                                                @empty
                                                    <option>No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('address')) ? 'has-error' : ''}}">
                                            <label for="address">School Address
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('address')}}</span></span>
                                            </label>
                                            <input name="address" class="form-control" id="address" type="text"
                                                   placeholder="school address" value="{{ old('address', $school->address) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('work_time')) ? 'has-error' : ''}}">
                                            <label for="work_time">Opening hours
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('work_time')}}</span></span>
                                            </label>
                                            <input name="email" class="form-control" id="work_time" type="text"
                                                   placeholder="school open hour" value="{{ old('work_time', $school->work_time) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('contact_phone')) ? 'has-error' : ''}}">
                                            <label for="contact_phone">Contact Phone
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('phone')}}</span></span>
                                            </label>
                                            <input name="contact_phone" class="form-control" id="contact_phone" type="text"
                                                   placeholder="contact phone" value="{{ old('contact_phone', $school->contact_phone) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('about_school')) ? 'has-error' : ''}}">
                                            <label for="about_school">About School
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('about_school')}}</span></span>
                                            </label>
                                            <textarea name="about_school" class="form-control" id="about_school" type="text"
                                                      placeholder="about school" value="">{{ old('about_school', $school->about_school) }}</textarea>
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
            </div>
        </section>
        <section class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">We're Social Too. Let's Connect</h2>
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('twitter_handle')) ? 'has-error' : ''}}">
                                            <label for="twitter_handle">School Twitter
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('twitter_handle')}}</span></span>
                                            </label>
                                            <input name="twitter_handle" class="form-control" id="twitter_handle" type="text"
                                                   placeholder="enter school twitter handle" value="{{ old('twitter_handle') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('facebook_handle')) ? 'has-error' : ''}}">
                                            <label for="facebook_handle">School Facebook
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('facebook_handle')}}</span></span>
                                            </label>
                                            <input name="facebook_handle" class="form-control" id="facebook_handle" type="text"
                                                   placeholder="enter school facebook handle" value="{{ old('facebook_handle') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                                            <label for="email">Contact Email
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                            </label>
                                            <input name="email" class="form-control" id="email" type="date"
                                                   placeholder="school contact email" value="{{ old('email', $school->email) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('instagram_handle')) ? 'has-error' : ''}}">
                                            <label for="instagram_handle">Instagram
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('instagram_handle')}}</span></span>
                                            </label>
                                            <input name="instagram_handle" class="form-control" id="instagram_handle" type="text"
                                                   placeholder="enter school instagram handle" value="{{ old('instagram_handle') }}">
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
            </div>
        </section>
        <br>
        <section class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-danger">Page Image Setup</h4>
                            <p></p>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blog_banner">News Banner
                                                <span class="text-danger">1340*894<span  class="text-danger h6">{{$errors->first('blog_banner_i')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="blog_banner_i">
                                                <label class="custom-file-label" for="blog_banner_i">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="school_logo_i">School Logo
                                                <span class="text-danger">162*57<span  class="text-danger h6">{{$errors->first('school_logo_i')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="school_logo_i">
                                                <label class="custom-file-label" for="school_logo_i">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="course_banner_i">Course Banner
                                                <span class="text-danger">1170*400<span  class="text-danger h6">{{$errors->first('course_banner_i')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="course_banner_i">
                                                <label class="custom-file-label" for="course_banner_i">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="banner_image_i">Banner Image
                                                <span class="text-danger">497*586<span  class="text-danger h6">{{$errors->first('banner_image_i')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="banner_image_i">
                                                <label class="custom-file-label" for="banner_image_i">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="event_image_i">Event Image
                                                <span class="text-danger">476*526<span  class="text-danger h6">{{$errors->first('event_image_i')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="event_image_i">
                                                <label class="custom-file-label" for="event_image_i">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="about_image_i">About Image
                                                <span class="text-danger">601*645<span  class="text-danger h6">{{$errors->first('about_image_i')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="about_image_i">
                                                <label class="custom-file-label" for="about_image_i">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mission_image_i">Mission Image
                                                <span class="text-danger">575*592<span  class="text-danger h6">{{$errors->first('mission_image_i')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="mission_image_i">
                                                <label class="custom-file-label" for="mission_image_i">Choose file</label>
                                            </div>
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
            </div>
        </section>
    </form>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!--This page plugins -->

@endsection

@section('script')
    <script src="{{ asset('../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    @parent
@endsection

