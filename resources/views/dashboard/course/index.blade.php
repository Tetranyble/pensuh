@extends('dashboard.layouts.dashboard')
@section('title', 'Courses')
@section('dashboard')
    <div class="container-fluid">
        <!-- basic table -->
        @include('components.flash-message')
        @foreach($errors->all() as $message)
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12">
                <!-- Row -->
                <div class="row">
                    <!-- column -->
                    @forelse($courses as $course)

                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{ asset('storage/'.$course->photo) }}"
                                 alt="{{ $course->name }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $course->name }}</h4>
                                <p class="card-text">{{ Str::limit(strip_tags($course->body), 100) }}</p>
                                @forelse($course->schedules as $schedule)
                                    <p><span>{{ Str::ucfirst($schedule->day) }}</span> <span>{{ $schedule->start . ' - ' . $schedule->end }}</span></p>
                                @empty
                                    <p><span>No Time Table</span></p>
                                @endforelse
                                @if(auth()->user()->roles->flatten()->pluck('slug')->contains('student'))
                                <div class="d-flex flex-wrap align-items-center pb-3">
                                    <div class="posted-by">
                                        <img style="width: 1.5rem;" src="{{ asset('storage/'.$course->teacher->first()->photo) }}" alt="{{ $course->teacher->first()->fullname }}">
                                        <a target="_blank" href="{{ route('teachers.show', $course->teacher->first()) }}" title="">{{ $course->teacher->first()->fullname }}</a>
                                        {{--                                            </div><strong class="price">$45</strong>--}}
                                    </div>
                                </div>
                                @endif
                                <a target="_blank" href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                @canany(['admin', 'principal', 'teacher', 'form_teacher', 'vice_principal_admin', 'director', 'vice_principal_academy'])
                                    <a href="{{ route('grades.create', ['t'=> $course->teacher->first()->id, 'c' => $course->id, 's' => $course->section->id, 'course_name', $course->slug])}}" class="btn btn-sm btn-outline-secondary">Score</a>
                                    <a href="{{ route('course.edit', $course)}}" class="btn btn-sm btn-outline-dark">Message</a>
                                @endcanany
{{--                                @canany(['admin', 'principal', 'form_teacher', 'vice_principal_admin', 'director', 'vice_principal_academy'])--}}
{{--                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('mastersheets.store') }}" aria-expanded="false"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                           document.getElementById('grade_update-{{ $course->id }}').submit();">--}}
{{--                                        Grade--}}
{{--                                    </a>--}}
{{--                                    <form id="grade_update-{{ $course->id }}" action="{{ route('mastersheets.store') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="course_name" value="{{ $course->slug }}">--}}
{{--                                        <input type="hidden" name="teacher" value="{{ $course->teacher->first()->id }}">--}}
{{--                                        <input type="hidden" name="course_id" value="{{ $course->id }}">--}}
{{--                                    </form>--}}
{{--                                @endcanany--}}

                                @canany(['admin', 'principal', 'vice_principal_admin', 'vice_principal_academy'])
                                <a href="{{ route('course.edit', $course)}}" class="btn btn-sm text-warning">Edit</a>
                                @endcanany
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                        @empty
                        <p>No data</p>
                    @endforelse
                    <!-- column -->
                </div>
            {{ $courses->links() }}
                <!-- Row -->
            </div>
        </div>
    </div>


@endsection


