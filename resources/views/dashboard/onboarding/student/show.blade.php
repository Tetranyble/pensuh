@extends('dashboard.layouts.dashboard')
@section('title', 'Student Information')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <div class="row">
            <div class="col-12">
                <div class="card profile_head">
                    <div class="card-body" style="background-image: url('{{ asset('storage/background.jpg') }}'); background-position: center; padding-bottom: 0;">
                        <h2 class="card-title" style="color: #fff;">{{ $home->school_name }}</h2>
                        <div class="profile_container" >
                            <div class="profile_name_container">
                                <div class="profile_detail">
                                    <div class="d-flex justify-content-between">
                                        <div class="profile_data">
                                            <span>{{ $user->fullname }}</span>
                                            <span>scientist</span>
                                        </div>
                                        <div class="profile_data text-align-center">
                                            <span>{{ $user->studentInfo->section->classes->name . ' - ' . $user->studentInfo->section->name }}</span>
                                            <span>Batch</span>
                                        </div>
                                        <div class="profile_data text-align-center">
                                            <span>{{ $user->studentInfo->session->name }}</span>
                                            <span>Session</span>
                                        </div>
                                    </div>

                                    <div class="profile_photo">
                                        <img src="{{ asset($user->photo) }}" alt="">
                                    </div>
                                </div>
                                <nav class="profile_nav">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Bio</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Guardian</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Fees</a>
                                        <a class="nav-item nav-link" id="nav-assessments-tab" data-toggle="tab" href="#nav-assessments" role="tab" aria-controls="nav-assessments" aria-selected="false">Assesments</a>
                                        <a class="nav-item nav-link" id="nav-attendance-tab" data-toggle="tab" href="#nav-attendance" role="tab" aria-controls="nav-attendance" aria-selected="false">Attendance</a>
                                        <a class="nav-item nav-link" id="nav-report-cards-tab" data-toggle="tab" href="#nav-report-cards" role="tab" aria-controls="nav-report-cards" aria-selected="false">Report Cards</a>
                                        <a class="nav-item nav-link" id="nav-batch-history-tab" data-toggle="tab" href="#nav-batch-history" role="tab" aria-controls="nav-batch-history" aria-selected="false">Batch History</a>
                                    </div>
                                </nav>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <div class="profile_about col-12">
                <div class="d-block">
                    <div class="profile_action">
{{--                        <button class="print btn btn-sm btn-info">Print Page</button>--}}
                    </div>
                    <div class="profile_about_data">
                        <p>{{ $user->about }}</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12 tab-content" id="nav-tabContent">
                <div class=" tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                   <div class="row">
                       <div class="card col-lg-6 col-md-6">
                           <div class="card-body">
                               <h4 style="color: gray;" class="card-title">STUDENT PROFILE</h4>
                               <div class="d-flex justify-content-between user-data"> <span>First Name:</span><span>{{ $user->firstname }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Middle Name:</span><span>{{ ($user->middlename) ? $user->middlename : ''  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Last Name:</span><span>{{ $user->lastname  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Date of Birth:</span><span>{{ $user->date_of_birth  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Gender:</span><span>{{ $user->gender->name  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Blood Group:</span><span>{{ $user->blood->name  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Admission Date:</span><span>{{ $user->created_at  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Nationality:</span><span>{{ $user->nationality->name  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Session:</span><span>{{ $user->studentInfo->session->name  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Group:</span><span>{{ $user->studentInfo->group->name  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Group:</span><span>{{ $user->religion->name  }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>School Type:</span><span>{{ $user->studentInfo->schoolType->name  }}</span></div>
                           </div>
                       </div>

                       <div class="card col-lg-6 col-md-6">
                           <div class="card-body">
                               <h4 style="color: gray;" class="card-title">CONTACTS</h4>
                               <div class="d-flex justify-content-between user-data"> <span>Phone:</span><span>{{ $user->phone }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Email:</span><span>{{ $user->email }}</span></div>
                               <div class="d-flex justify-content-between user-data"> <span>Address:</span><span>{{ $user->address }}</span></div>
                           </div>
                       </div>
                   </div>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="card col-lg-6 col-md-6">
                            <div class="card-body">
                                <h4 style="color: gray;" class="card-title">FATHER</h4>
                                <div class="d-flex justify-content-between user-data"> <span>Name:</span><span>{{ $user->studentInfo->father_name }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Phone:</span><span>{{ $user->studentInfo->father_phone_number }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Email:</span><span>{{ $user->studentInfo->father_email  }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>National Identity:</span><span>{{ $user->studentInfo->father_national_id  }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Designation:</span><span>{{ $user->studentInfo->father_designation }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Annual Income:</span><span>{{ $user->studentInfo->father_annual_income }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Admission Date:</span><span>{{ $user->studentInfo->father_occupation  }}</span></div>
                            </div>
                        </div>

                        <div class="card col-lg-6 col-md-6">
                            <div class="card-body">
                                <h4 style="color: gray;" class="card-title">MOTHER</h4>
                                <div class="d-flex justify-content-between user-data"> <span>Name:</span><span>{{ $user->studentInfo->mother_name }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Phone:</span><span>{{ $user->studentInfo->mother_phone_number }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Email:</span><span>{{ $user->studentInfo->mother_email  }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>National Identity:</span><span>{{ $user->studentInfo->mother_national_id  }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Designation:</span><span>{{ $user->studentInfo->mother_designation }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Annual Income:</span><span>{{ $user->studentInfo->father_annual_income }}</span></div>
                                <div class="d-flex justify-content-between user-data"> <span>Admission Date:</span><span>{{ $user->studentInfo->mother_occupation  }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="card col-lg-6 col-md-6">
                            <div class="card-body">
                                <p>No fee yet</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-assessments" role="tabpanel" aria-labelledby="nav-assessments-tab">
                    <div class="row">
                        <div class="card col-lg-6 col-md-6">
                            <div class="card-body">
                                <p>No assessments yet</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-attendance" role="tabpanel" aria-labelledby="nav-attendance-tab">
                    <div class="row">
                        <div class="card col-lg-6 col-md-6">
                            <div class="card-body">
                                <p>No attendance yet</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-report-cards" role="tabpanel" aria-labelledby="nav-report-cards-tab">
                    <div class="row">
                        <div class="card col-lg-6 col-md-6">
                            <div class="card-body">
                                <p>No report cards yet</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-notes" role="tabpanel" aria-labelledby="nav-notes-tab">
                    <div class="row">
                        <div class="card col-lg-6 col-md-6">
                            <div class="card-body">
                                <p>No assessments yet</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-batch-history" role="tabpanel" aria-labelledby="nav-batch-history-tab">
                    <div class="row">
                        <div class="card col-lg-6 col-md-6">
                            <div class="card-body">
                                <p>No batch history yet</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <style>
        .school_name{
            margin: 1rem;
        }
        .content{
            background-color: aqua;
            padding: 2rem;
        }
        div .profile_head{
            background-color: #4BCADD;
            border-bottom: 0;
        }
        .profile_container{
            padding-top:  10rem;
        }
        .profile_name_container{
            min-height: 150px;
            background: white;
            border-radius: 15px 15px 0 0;
        }
        .profile_about{
            background-color: #fff;
        }
        .profile_detail{
            padding-left: 1rem;
            font-size: 1rem;
            padding-top: 45%;
            font-weight: 600;
            /* margin-bottom: 5rem; */
            border: 2px solid white;
            border-radius: 15px 15px 0 0;
            background-color: #12D9FA;
            position: relative;
            color: #fff;
        }
        .profile_data span{
            display: block;
        }
        .profile_data span:nth-child(2){
            font-size: .8rem;
            font-weight: 400;
        }
        .profile_detail .d-flex{
            padding: .75rem 1rem .75rem 0;

        }
        .profile_nav{
            padding-left: 14%;
            margin-top: 3rem;
            font-weight: 600;

        }
        .tab-content{
            background-color: white;
        }
        .text-align-center{
            text-align: center;
        }
        .profile_photo img {
            border-radius: 15px;
            max-width: 60%;
            border: 2px solid #ddd;
            position: absolute;
            top: -20%;
            left: 20%;

        }
        .user-data{
            font-size: 1.1rem;

            border-bottom: 1px solid #ddd;
            /* border-top: 1px solid #ddd; */
            padding: .6rem 0 .6rem 0;
        }
        @media (min-width: 576px){
            .profile_detail{
                padding-left: 1rem;

                font-size: 1.5rem;
                padding-top: 45%;
            }
            .profile_photo img {
                border-radius: 15px;
                max-width: 50%;
                top: -20%;
                left: 25%;

            }
            .profile_detail .d-flex{
                padding: .75rem 1rem .75rem 0;

            }
        }
        @media (min-width: 768px){
            .profile_detail{
                padding-left: 30%;
                font-size: 1.5rem;
                padding-top: 0;
            }
            .profile_photo img {
                border-radius: 15px;
                max-width: 20%;
                top: -20%;
                left: 5%;
            }
            .profile_nav {
                padding-left: 30%;
            }
        }
        @media (min-width: 992px){
            .profile_detail{
                padding-left: 20%;
                font-size: 1.5rem;
                padding-top: 0;
            }
            .profile_photo img {
                max-width: 16%;
                top: -20%;
                left: 2%;
            }
            .profile_nav {
                padding-left: 20%;
            }
        }

        @media (min-width: 1280px){
            .profile_detail{
                padding-left: 18%;
                font-size: 1.5rem;
                padding-top: 0;
            }
            .profile_data span:nth-child(2){
                font-size: 1rem;
            }
            .profile_photo img {
                max-width: 14%;
                top: -20%;
                left: 2%;
            }
            .profile_nav {
                padding-left: 18%;
            }
        }
        @media (min-width: 1366px){
            .profile_detail{
                padding-left: 201px;
                font-size: 1.5rem;
                padding-top: 0;
            }
            .profile_data span:nth-child(2){
                font-size: 1rem;
            }
            .profile_photo img {
                max-width: 151.2px;
                top: -20%;
                left: 25.2px;
            }
            .profile_nav {
                padding-left: 202px;
            }
        }

        .profile_about{
            padding: 2rem 3rem 2rem 3rem;

        }
        .profile_action > .btn-info{
            background-color: #1FA2FF;
            color: #fff;
            font-weight: 400;

        }
        .profile_about_data {
            padding-top: 1rem;

        }
        .profile_action{
            min-width: 3rem;

        }
        .nav > .nav-link{
            color: #ddd;
            font-weight: 600;
        }
        .nav-tabs .nav-link.active {
            color: #1FA2FF;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }
    </style>
    @parent
@endsection
