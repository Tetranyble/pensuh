@extends('dashboard.layouts.dashboard')
@section('title', 'Schools')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <ul>
            @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
            @endforeach
        </ul>
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Schools</h4>
                        <div class="d-flex justify-content-between p-2 pb-1"><a></a><a class="btn btn-sm btn-outline-success" href="{{ route('schools.create') }}"><i class="fa fa-plus"></i>Create School</a></div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>School Name</small></th>
                                    <th><small>Short Name</small></th>
                                    <th><small>School Code</small></th>
                                    <th><small>School Phone</small></th>
                                    <th><small>Subdomain</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($schools as $key => $school)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $school->school_name }}</td>
                                        <td>{{ $school->school_name_code }}</td>
                                        <td>{{ $school->code }}</td>
                                        <td>{{ $school->contact_phone }}</td>
                                        <td><a href="{{ url('//'.$school->alias) }}" target="_blank"> {{ $school->alias }}</a></td>
                                        <td><small>
                                                @can('master')
                                                    <a class="sidebar-link sidebar-link text-warning" href="{{ route('impersonates.enter') }}" aria-expanded="false"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('impersonate-form-{{ $school->id }}').submit();">
                                                        <i data-feather="log-in" class="feather-icon"></i><span class="hide-menu">{{ __('Impersonate') }}</span>
                                                    </a>
                                                    <form id="impersonate-form-{{ $school->id }}" action="{{ route('impersonates.enter') }}" method="POST" class="d-none">
                                                        @csrf
                                                        <input type="hidden"  name="id" value="{{ $school->id }}">
                                                        <input type="hidden"  name="school" value="{{ $school->id }}">
                                                    </form>
                                                @endcan
                                            </small>
                                            @if(!$school->users->map->roles->flatten()->pluck('slug')->contains('principal'))
                                            <small>
                                                <a href="{{ route('system.users.create', ['school' => $school->id]) }}">Create Admin</a>
                                            </small>
                                            @endif
                                        </td>
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
                                    <th><small>School Name</small></th>
                                    <th><small>Short Name</small></th>
                                    <th><small>School Code</small></th>
                                    <th><small>School Phone</small></th>
                                    <th><small>Subdomain</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $schools->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
@endsection

