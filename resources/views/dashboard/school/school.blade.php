@extends('dashboard.layouts.dashboard')
@section('title', 'School')
@section('dashboard')
    <link href="{{ asset('../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <br>
    <form action="{{ route('schools.store') }}" method="POST" enctype="multipart/form-data">
        <section class="container-fluid">
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
                            <h4 class="card-title">Let's Meet Your School</h4>
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_name')) ? 'has-error' : ''}}">
                                            <label for="school_name">School Name
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('school_name')}}</span></span>
                                            </label>
                                            <input name="school_name" class="form-control" id="school_name" type="text"
                                                   placeholder="school name" value="{{ old('school_name', $school->school_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_name_code')) ? 'has-error' : ''}}">
                                            <label for="school_name_code">School Abbreviation
                                                <span class="text-danger">*<span  class="text-danger h6">{{$errors->first('school_name_code')}}</span></span>
                                            </label>
                                            <input name="school_name_code" class="form-control" id="school_name_code" type="text"
                                                   placeholder="school name abbreviation" value="{{ old('school_name_code', $school->school_name_code) }}">
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
                                                    <option {{ old('language_id', $school->language->id) == $language->id ? "selected" : "" }} value="{{ $language->id }}">{{ $language->name }}</option>
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
                                            <input name="work_time" class="form-control" id="work_time" type="text"
                                                   placeholder="school open hour" value="{{ old('work_time', $school->work_time) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('about_school')) ? 'has-error' : ''}}">
                                            <label for="about_school">About School
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('about_school')}}</span></span>
                                            </label>
                                            <textarea name="about_school" class="form-control" id="about_school" type="text"
                                                      placeholder="about school" cols="1" rows="1" value="">{{ old('about_school', $school->about_school) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('address')) ? 'has-error' : ''}}">
                                            <label for="address">Address
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('address')}}</span></span>
                                            </label>
                                            <input name="address" class="form-control" id="address" type="text"
                                                   placeholder="enter where you address" value="{{ old('address', $school->address) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('theme')) ? 'has-error' : ''}}">
                                            <label for="theme">Site Theme
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('theme')}}</span></span>
                                            </label>
                                            <input name="theme" class="form-control" id="theme" type="text"
                                                   placeholder="enter site colour" value="{{ old('theme', $school->theme) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_excerpt')) ? 'has-error' : ''}}">
                                            <label for="school_excerpt">Short School Description
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_excerpt')}}</span></span>
                                            </label>
                                            <input name="school_excerpt" class="form-control" id="school_excerpt" type="text"
                                                   placeholder="enter school excerpt" value="{{ old('school_excerpt', $school->school_excerpt) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_excerpt_header')) ? 'has-error' : ''}}">
                                            <label for="school_excerpt_header">Excerpt Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_excerpt_header')}}</span></span>
                                            </label>
                                            <input name="school_excerpt_header" class="form-control" id="adschool_excerpt_header" type="text"
                                                   placeholder="enter school excerpt header" value="{{ old('school_excerpt_header', $school->school_excerpt_header) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_welcome_header')) ? 'has-error' : ''}}">
                                            <label for="school_welcome_header">School welcome message
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_welcome_header')}}</span></span>
                                            </label>
                                            <input name="school_welcome_header" class="form-control" id="school_welcome_header" type="text"
                                                   placeholder="enter site welcome header" value="{{ old('school_welcome_header', $school->school_welcome_header) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_welcome_body')) ? 'has-error' : ''}}">
                                            <label for="school_welcome_body">About school
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_welcome_body')}}</span></span>
                                            </label>
                                            <input name="school_welcome_body" class="form-control" id="school_welcome_body" type="text"
                                                   placeholder="describe your school" value="{{ old('school_welcome_body', $school->school_welcome_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_class_header')) ? 'has-error' : ''}}">
                                            <label for="school_class_header">School Class Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_class_header')}}</span></span>
                                            </label>
                                            <input name="school_class_header" class="form-control" id="school_class_header" type="text"
                                                   placeholder="enter school class header" value="{{ old('school_class_header', $school->school_class_header) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_class_body')) ? 'has-error' : ''}}">
                                            <label for="school_class_body">School Class Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_class_body')}}</span></span>
                                            </label>
                                            <input name="school_class_body" class="form-control" id="school_class_body" type="text"
                                                   placeholder="enter school class body" value="{{ old('school_class_body', $school->school_class_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_teacher_header')) ? 'has-error' : ''}}">
                                            <label for="school_teacher_header">School Teacher Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_teacher_header')}}</span></span>
                                            </label>
                                            <input name="school_teacher_header" class="form-control" id="school_teacher_header" type="text"
                                                   placeholder="enter school teacher heaher" value="{{ old('school_teacher_header', $school->school_teacher_header) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_teacher_body')) ? 'has-error' : ''}}">
                                            <label for="school_teacher_body">School Teacher Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_teacher_body')}}</span></span>
                                            </label>
                                            <input name="school_teacher_body" class="form-control" id="school_teacher_body" type="text"
                                                   placeholder="enter school teacher body" value="{{ old('school_teacher_body', $school->school_teacher_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_news_header')) ? 'has-error' : ''}}">
                                            <label for="school_news_header">School News Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_news_header')}}</span></span>
                                            </label>
                                            <input name="school_news_header" class="form-control" id="school_news_header" type="text"
                                                   placeholder="enter school news header" value="{{ old('school_news_header', $school->school_news_header) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_news_body')) ? 'has-error' : ''}}">
                                            <label for="school_news_body">School News Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_news_body')}}</span></span>
                                            </label>
                                            <input name="school_news_body" class="form-control" id="school_news_body" type="text"
                                                   placeholder="enter school news body" value="{{ old('school_news_body', $school->school_news_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_event_header')) ? 'has-error' : ''}}">
                                            <label for="school_event_header">School Event Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_event_header')}}</span></span>
                                            </label>
                                            <input name="school_event_header" class="form-control" id="school_event_header" type="text"
                                                   placeholder="enter school event header" value="{{ old('school_event_header', $school->school_event_header) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_event_body')) ? 'has-error' : ''}}">
                                            <label for="school_event_body">School Event Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('school_event_body')}}</span></span>
                                            </label>
                                            <input name="school_event_body" class="form-control" id="school_event_body" type="text"
                                                   placeholder="enter school event body" value="{{ old('school_event_body', $school->school_event_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('teacher_support')) ? 'has-error' : ''}}">
                                            <label for="teacher_support">Teacher Support Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('teacher_support')}}</span></span>
                                            </label>
                                            <input name="teacher_support" class="form-control" id="teacher_support" type="text"
                                                   placeholder="enter teacher support header" value="{{ old('teacher_support', $school->teacher_support) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('teacher_support_body')) ? 'has-error' : ''}}">
                                            <label for="teacher_support_body">Teacher Support Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('teacher_support_body')}}</span></span>
                                            </label>
                                            <input name="teacher_support_body" class="form-control" id="teacher_support_body" type="text"
                                                   placeholder="enter teacher support body" value="{{ old('teacher_support_body', $school->teacher_support_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('certificate_acceptance')) ? 'has-error' : ''}}">
                                            <label for="certificate_acceptance">School Certificate Acceptance
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('certificate_acceptance')}}</span></span>
                                            </label>
                                            <input name="certificate_acceptance" class="form-control" id="certificate_acceptance" type="text"
                                                   placeholder="enter school certificate acceptance header" value="{{ old('certificate_acceptance', $school->certificate_acceptance) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('certificate_acceptance_body')) ? 'has-error' : ''}}">
                                            <label for="certificate_acceptance_body">School Certificate Acceptance Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('certificate_acceptance_body')}}</span></span>
                                            </label>
                                            <input name="certificate_acceptance_body" class="form-control" id="certificate_acceptance_body" type="text"
                                                   placeholder="enter school certificate acceptance body" value="{{ old('certificate_acceptance_body', $school->certificate_acceptance_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('program')) ? 'has-error' : ''}}">
                                            <label for="program">School Program Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('program')}}</span></span>
                                            </label>
                                            <input name="program" class="form-control" id="school_welcome_header" type="text"
                                                   placeholder="enter school program header" value="{{ old('program', $school->program) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('program_body')) ? 'has-error' : ''}}">
                                            <label for="program_body">School Program Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('program_body')}}</span></span>
                                            </label>
                                            <input name="program_body" class="form-control" id="program_body" type="text"
                                                   placeholder="enter school program body" value="{{ old('program_body', $school->program_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('support')) ? 'has-error' : ''}}">
                                            <label for="support">School Support Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('support')}}</span></span>
                                            </label>
                                            <input name="support" class="form-control" id="support" type="text"
                                                   placeholder="enter school support" value="{{ old('support', $school->support) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('support_body')) ? 'has-error' : ''}}">
                                            <label for="support_body">School Support Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('support_body')}}</span></span>
                                            </label>
                                            <input name="support_body" class="form-control" id="support_body" type="text"
                                                   placeholder="enter school support" value="{{ old('support_body', $school->support_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('mission_header')) ? 'has-error' : ''}}">
                                            <label for="mission_header">School Mission Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('mission_header')}}</span></span>
                                            </label>
                                            <input name="mission_header" class="form-control" id="mission_header" type="text"
                                                   placeholder="enter school mission header" value="{{ old('mission_header', $school->mission_header) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('mission_body')) ? 'has-error' : ''}}">
                                            <label for="mission_body">School Mission Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('mission_body')}}</span></span>
                                            </label>
                                            <input name="mission_body" class="form-control" id="mission_body" type="text"
                                                   placeholder="enter school mission" value="{{ old('mission_body', $school->mission_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('benefit_header')) ? 'has-error' : ''}}">
                                            <label for="benefit_header">School Benefit Header
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('benefit_header')}}</span></span>
                                            </label>
                                            <input name="benefit_header" class="form-control" id="benefit_header" type="text"
                                                   placeholder="enter school benefit header" value="{{ old('benefit_header', $school->benefit_header) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('benefit_body')) ? 'has-error' : ''}}">
                                            <label for="benefit_body">School Benefit Body
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('benefit_body')}}</span></span>
                                            </label>
                                            <input name="benefit_body" class="form-control" id="benefit_body" type="text"
                                                   placeholder="enter school benefit body" value="{{ old('benefit_body', $school->benefit_body) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('map')) ? 'has-error' : ''}}">
                                            <label for="map">School Map <small><a  href="https://www.google.com/maps">paste the embeddable code</a></small>
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('map')}}</span></span>
                                            </label>
                                            <textarea name="map" class="form-control" id="map" type="text"
                                                      placeholder="enter school map" cols="1" rows="1">{{ old('map', $school->map) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">

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
                            <h4 class="card-title">We're Social Too. Let's Connect</h4>
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('twitter_handle')) ? 'has-error' : ''}}">
                                            <label for="twitter_handle">School Twitter
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('twitter_handle')}}</span></span>
                                            </label>
                                            <input name="twitter_handle" class="form-control" id="twitter_handle" type="text"
                                                   placeholder="enter school twitter handle" value="{{ old('twitter_handle',$school->twitter_handle) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('facebook_handle')) ? 'has-error' : ''}}">
                                            <label for="facebook_handle">School Facebook
                                                <span class="text-danger"><span  class="text-danger h6">{{$errors->first('facebook_handle')}}</span></span>
                                            </label>
                                            <input name="facebook_handle" class="form-control" id="facebook_handle" type="text"
                                                   placeholder="enter school facebook handle" value="{{ old('facebook_handle', $school->facebook_handle) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('instagram_handle')) ? 'has-error' : ''}}">
                                            <label for="instagram_handle">Instagram
                                                <span class="text-danger"> <span  class="text-danger h6">{{$errors->first('instagram_handle')}}</span></span>
                                            </label>
                                            <input name="instagram_handle" class="form-control" id="instagram_handle" type="text"
                                                   placeholder="enter school instagram handle" value="{{ old('instagram_handle', $school->instagram_handle) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                                            <label for="email">Contact Email
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                            </label>
                                            <input name="email" class="form-control" id="email" type="email"
                                                   placeholder="school contact email" value="{{ old('email', $school->email) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('contact_phone')) ? 'has-error' : ''}}">
                                            <label for="contact_phone">Contact Phone
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('contact_phone')}}</span></span>
                                            </label>
                                            <input name="contact_phone" class="form-control" id="contact_phone" type="text"
                                                   placeholder="contact phone" value="{{ old('contact_phone', $school->contact_phone) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('alias')) ? 'has-error' : ''}}">
                                            <label for="alias">Alias
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('alias_x')}}</span></span>
                                            </label>
                                            <input name="alias_x" class="form-control" id="alias" type="text"
                                                   placeholder="alias" value="{{ old('alias_x', $school->alias) }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
{{--                                    <button type="submit" class="btn btn-info">Submit</button>--}}

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
                                    <input name="id" type="hidden" value="{{ $school->id }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blog_banner_x">News Banner
                                                <span class="text-danger">1340*894<span  class="text-danger h6">{{$errors->first('blog_banner_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="blog_image_x" type="file" class="custom-file-input" id="blog_banner_x">
                                                <label class="custom-file-label" for="blog_banner_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="school_logo_x">School Logo
                                                <span class="text-danger">162*57<span  class="text-danger h6">{{$errors->first('school_logo_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="school_logo_x" type="file" class="custom-file-input" id="school_logo_x">
                                                <label class="custom-file-label" for="school_logo_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="course_banner_x">Course Banner
                                                <span class="text-danger">1170*400<span  class="text-danger h6">{{$errors->first('course_banner_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="course_banner_x" type="file" class="custom-file-input" id="course_banner_x">
                                                <label class="custom-file-label" for="course_banner_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="banner_image_x">Banner Image
                                                <span class="text-danger">497*586<span  class="text-danger h6">{{$errors->first('banner_image_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="banner_image_x" type="file" class="custom-file-input" id="banner_image_x">
                                                <label class="custom-file-label" for="banner_image_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="event_image_x">Event Image
                                                <span class="text-danger">476*526<span  class="text-danger h6">{{$errors->first('event_image_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="event_image_x" type="file" class="custom-file-input" id="event_image_x">
                                                <label class="custom-file-label" for="event_image_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="about_image_x">About Image
                                                <span class="text-danger">601*645<span  class="text-danger h6">{{$errors->first('about_image_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="about_image_x" type="file" class="custom-file-input" id="about_image_x">
                                                <label class="custom-file-label" for="about_image_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mission_image_x">Mission Image
                                                <span class="text-danger">575*592<span  class="text-danger h6">{{$errors->first('mission_image_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="mission_image_x" type="file" class="custom-file-input" id="mission_image_x">
                                                <label class="custom-file-label" for="mission_image_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="favicon_x">School Favicon
                                                <span class="text-danger">32*32<span  class="text-danger h6">{{$errors->first('favicon_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input disabled name="favicon_x" type="file" class="custom-file-input disabled" id="favicon_x">
                                                <label class="custom-file-label" for="favicon_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>

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

