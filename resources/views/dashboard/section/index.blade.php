@extends('dashboard.layouts.dashboard')
@section('title', 'Sections')
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
                        <h4 class="card-title">Sections</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Class Name</small></th>
                                    <th><small>Section Name</small></th>
                                    <th><small>Class Room</small></th>
                                    <th><small>Form Teacher</small></th>
                                    <th><small>Courses</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sections as $key => $section)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td><small>{{ $section->classes->name }}</small></td>
                                        <td><small>{{ $section->name }}</small></td>
                                        <td><small>{{ $section->classroom }}</small></td>
                                        <td><small>{{ $section->formTeacher->fullname }}</small></td>
                                        <td><small>
                                                <a class="btn btn-sm btn-outline-info"  data-href="{{ route('sections.show', $section) }}"
                                                       href="{{ route('sections.courses',[ 'section' => $section]) }}">View Courses</a>
                                                <a class="btn btn-sm btn-outline-success" href="{{ route('course.create', ['section' => $section->id]) }}"><i class="fa fa-plus"></i></a>
                                            </small></td>
                                        <td><small>
                                                @canany(['master','principal'])
                                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('sections.edit', $section) }}">Edit</a>
                                                @else
                                                    <a onclick="return false;" title="Unauthorized" class="btn btn-sm btn-outline-danger" href="{{ route('sections.edit', $section) }}">Edit</a>
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
                                    <th><small>Name</small></th>
                                    <th><small>Class Room</small></th>
                                    <th><small>Form Teacher</small></th>
                                    <th><small>Courses</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $sections->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="section_view" tabindex="-1" role="dialog"
         aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="section_views">

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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

