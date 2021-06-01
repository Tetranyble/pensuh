@extends('dashboard.layouts.dashboard')
@section('title', 'Psychometrics')
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
                        <h4 class="card-title">Psychometric Keys</h4>
                        <div class="d-flex justify-content-between pt-3 pb-3">
                            <div></div>
                            <div><a href="{{ route('psychometrics.create') }}" class="btn btn-sm btn-outline-success">New Psychometric</a></div>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Name</small></th>
                                    <th><small>Key</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($psychometrics as $key => $psychometric)
                                    <tr>
                                        <td><small>{{ $key+1 }}</small></td>
                                        <td><small>{{ $psychometric->name }}</small></td>
                                        <td><small>{{ $psychometric->key }}</small></td>
                                        <td><small>
                                                @canany(['principal', 'admin'])
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('psychometrics.edit', $psychometric) }}"><i class="fa fa-edit"></i>Edit</a>
                                                @endcanany
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
                                    <th><small>Name</small></th>
                                    <th><small>Key</small></th>
                                    <th><small>Action</small></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{ $psychometrics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


