@extends('dashboard.layouts.dashboard')
@section('title', 'Courses')
@section('dashboard')
    <link href="{{ asset('../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->

    <div class="container-fluid">
        <!-- basic table -->

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
                                <a target="_blank" href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">View</a>
                                @canany(['admin', 'principal', 'master'])
                                <a href="{{ route('course.edit', $course)}}" class="btn text-warning">Edit</a>
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

@section('script')
    <script src="{{ asset('../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    @parent
@endsection

