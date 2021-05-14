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
                            <img class="card-img-top img-fluid" src="{{ asset($course->photo) }}"
                                 alt="{{ $course->name }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $course->name }}</h4>
                                <p class="card-text">{{ Str::limit(strip_tags($course->body), 100) }}</p>
                                <a target="_blank" href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                @canany(['admin', 'principal', 'master', 'teacher'])
                                    <a href="{{ route('grades.create', ['t'=> $course->teacher->first()->id, 'c' => $course->id, 's' => $course->section->id])}}" class="btn btn-sm btn-outline-secondary">Grade</a>
                                    <a href="{{ route('course.edit', $course)}}" class="btn btn-sm btn-outline-dark">Message</a>
                                @endcanany
                                @canany(['admin', 'principal', 'master', 'form_teacher'])
                                    @if($course->section->form_teacher === auth()->user()->id )
                                    <a href="{{ route('report.create', ['section' => $course->section->id, 'exam' => '', 'form_teacher' => $course->section->form_teacher, 'course'=> $course->id]) }}" class="btn btn-sm btn-outline-info">Report Card</a>
                                    @endif
                                @endcanany
                                @canany(['admin', 'principal', 'master'])
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


