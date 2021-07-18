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
                        <h4 class="card-title">System Users</h4>
                        <div class="d-flex justify-content-between p-2 pb-1">
                            <div></div>
                            <div>
                                <form class="" method="GET" action="{{ route('system.users') }}">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="username/id/name" aria-label="username/id/name" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-secondary" type="button">search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>ID</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Code</small></th>
                                    <th><small>Phone</small></th>
                                    <th><small>Email</small></th>
                                    <th><small>Role(s)</small></th>
                                    <th><small>School</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->longname }}</td>
                                        <td>{{ $user->code }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td style="white-space: initial"><small>{{ $user->roles->flatten()->pluck('name') }}</small></td>
                                        <td>{{ $user->school->school_name_code }}</td>
                                        <td ><small>
                                                @can('master')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('impersonates.enter') }}" aria-expanded="false"
                                                       onclick="event.preventDefault();
                                                           document.getElementById('impersonate-form-{{ $user->id }}').submit();">
                                                        <i data-feather="log-in" class="feather-icon"></i><span class="hide-menu">{{ __('Impersonate') }}</span>
                                                    </a>
                                                    <form id="impersonate-form-{{ $user->id }}" action="{{ route('impersonates.enter') }}" method="POST" class="d-none">
                                                        @csrf
                                                        <input type="hidden"  name="id" value="{{ $user->id }}">
                                                    </form>
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
                                    <th><small>ID</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Code</small></th>
                                    <th><small>Phone</small></th>
                                    <th><small>Email</small></th>
                                    <th><small>Role(s)</small></th>
                                    <th><small>School</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
@endsection

