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
                                                    <a class="btn btn-sm btn-outline-info" data-toggle="modal" id="show"  data-href="{{ route('sections.show', $section) }}"
                                                       href="{{ route('sections.show', $section) }}">{{ $section->name }}</a>
                                                        @empty

                                                        @endforelse
                                                    @empty(!$class->sections)
                                                            <a class="btn btn-sm btn-outline-success" href="{{ route('sections.create', ['class' => $class->id]) }}"><i class="fa fa-plus"></i></a>
                                                        @endempty
                                                </small></td>
                                            <td><small>
                                                    @canany(['master','principal','admin'])
                                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('class.edit', $class) }}">Edit</a>

                                                    @elsecan
                                                        <a onclick="return false;" title="Authorized" class="btn btn-sm btn-outline-danger" href="{{ route('class.edit', $class) }}">Edit</a>
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
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).ready(function () {
                    const app_url = '{{ URL::asset('/') }}'
                    /* When click New customer button */
                    $('#new-customer').click(function () {
                        $('#btn-save').val("create-customer");
                        $('#customer').trigger("reset");
                        $('#customerCrudModal').html("Add New Customer");
                        $('#crud-modal').modal('show');
                    });

                    /* Edit customer */
                    $('body').on('click', '#edit-customer', function () {
                        var customer_id = $(this).data('id');
                        $.get('customers/' + customer_id + '/edit', function (data) {
                            $('#customerCrudModal').html("Edit customer");
                            $('#btn-update').val("Update");
                            $('#btn-save').prop('disabled', false);
                            $('#crud-modal').modal('show');
                            $('#cust_id').val(data.id);
                            $('#name').val(data.name);
                            $('#email').val(data.email);
                            $('#address').val(data.address);
                        })
                    });
                    /* Show customer */
                    $(document).on('click', '#show', function(event) {
                        event.preventDefault();
                        let href = $(this).attr('data-href');
                        $.ajax({
                            url: href,
                            beforeSend: function() {
                                $('.preloader').show();
                            },
                            // return the result
                            success: function(r) {
                                $('#info-header-modal').modal("show");
                                console.log(r)
                                $('#section_views').html(`
                                <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="info-header-modalLabel">Section ${r.data.name} of ${r.data.classes.name}</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 p-4">
                        <h4 class="card-title">Section Details</h4>
                        <ul class="list-unstyled">
                            <li>Class Capacity: ${r.data.capacity}</li>
                            <li>Classroom: ${r.data.classroom}</li>
                        </ul>
                    </div>
                    <div class="col-md-12 p-4">
                        <h4 class="card-title">Form Teacher</h4>
                        <ul class="list-unstyled">
                            <li class="media">
                                <img class="d-flex mr-3" src="${ r.data.form_teacher ? app_url + r.data.form_teacher.photo : '#'}" width="60" alt="user">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1"><a target="_blank" href="${app_url + 'teachers/' + r.data.form_teacher.username}">${r.data.form_teacher.firstname + ' ' + r.data.form_teacher.lastname}</a></h5>
                                    ${r.data.form_teacher.about}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-dismiss="modal">Close</button>
                    <a href="${app_url + 'setup/sections/' + r.data.id + '/edit '}" class="btn btn-info">Edit</a>
                </div>
            </div>
                            ` );
                            },
                            complete: function() {
                                $('.preloader').hide();
                            },
                            error: function(jqXHR, testStatus, error) {
                                console.log(error);
                                alert("Page " + href + " cannot open. Error:" + error);
                                $('.preloader').hide();
                            },
                            timeout: 8000
                        })

                        /* Delete customer */
                        $('body').on('click', '#delete-customer', function () {
                            var customer_id = $(this).data("id");
                            var token = $("meta[name='csrf-token']").attr("content");
                            confirm("Are You sure want to delete !");

                            $.ajax({
                                type: "DELETE",
                                url: "http://localhost/laravel7crud/public/customers/"+customer_id,
                                data: {
                                    "id": customer_id,
                                    "_token": token,
                                },
                                success: function (data) {
                                    $('#msg').html('Customer entry deleted successfully');
                                    $("#customer_id_" + customer_id).remove();
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                }
                            });
                        });
                    });
                })

            </script>
    @parent
@endsection

