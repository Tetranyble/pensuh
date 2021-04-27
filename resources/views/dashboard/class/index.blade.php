@extends('dashboard.layouts.dashboard')
@section('title', 'Classes')
@section('dashboard')
    <link href="{{ asset('../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->

        <div class="container-fluid">
            <!-- basic table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Classes</h4>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                    <tr>
                                        <th><small>#</small></th>
                                        <th><small>Class Name</small></th>
                                        <th><small>Class Age</small></th>
                                        <th><small>Description</small></th>
                                        <th><small>Syllabus</small></th>
                                        <th><small>Sections</small></th>
                                        <th><small>Action</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($classes as $key => $class)
                                        <tr>
                                            <td><small>{{ $key+1 }}</small></td>
                                            <td><small>{{ $class->name }}</small></td>
                                            <td><small>{{ $class->age }}</small></td>
                                            <td><small>{{ $class->description }}</small></td>
                                            <td><small><a class="btn btn-sm btn-outline-primary" href="{{ route('syllabi.show', $class->syllabus->slug) }}">{{ $class->syllabus->name }}</a></small></td>

                                            <td><small>
                                                    @forelse($class->sections as $section)
                                                    <a class="btn btn-sm btn-outline-info" href="{{ route('sections.show', $section) }}">{{ $section->name }}</a>
                                                        @empty

                                                        @endforelse
                                                    @empty(!$class->sections)
                                                            <a class="btn btn-sm btn-outline-success" href="{{ route('sections.create', ['class' => $class->id]) }}"><i class="fa fa-plus"></i></a>
                                                        @endempty
                                                </small></td>
                                            <td><small>
                                                    @canany(['master','principal'])
                                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('classes.edit', $class) }}">Edit</a>

                                                    @elsecan
                                                        <a onclick="return false;" title="Authorized" class="btn btn-sm btn-outline-danger" href="{{ route('classes.edit', $class) }}">Edit</a>
                                                    @endcan
                                                </small></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>No data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><small>#</small></th>
                                        <th><small>Class Name</small></th>
                                        <th><small>Class Age</small></th>
                                        <th><small>Description</small></th>
                                        <th><small>Syllabus</small></th>
                                        <th><small>Sections</small></th>
                                        <th><small>Action</small></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{ $classes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

