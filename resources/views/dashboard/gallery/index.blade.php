@extends('dashboard.layouts.dashboard')
@section('title', 'Gallery')
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
                    @forelse($galleries as $gallery)

                        <div class="col-lg-4 col-md-6">
                            <!-- Card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" title="{{ $gallery->name }}" src="{{ asset('storage/'.$gallery->photo) }}"
                                     alt="{{ $gallery->name }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $gallery->name }}</h4>
                                    <p class="card-text">{{ Str::limit(strip_tags($gallery->description), 200) }}</p>
{{--                                    <a target="_blank" href="{{ route('galleries.show', $course->id) }}" class="btn btn-sm btn-outline-primary">View</a>--}}
                                    @canany(['admin', 'principal', 'master', 'vice_principal_academy', 'vice_principal_admin'])
                                        <a href="{{ route('galleries.edit', $gallery)}}" class="btn btn-sm btn-outline-warning"><i data-feather="edit" class="feather-icon"></i><span class="hide-menu">{{ __('Edit') }}</span></a>
                                        <a class="btn btn-sm btn-outline-danger" href="{{ route('galleries.destroy', $gallery) }}" aria-expanded="false"
                                           onclick="event.preventDefault();
                                                     document.getElementById('gallery-delete').submit();">
                                            <i data-feather="trash-2" class="feather-icon"></i><span class="hide-menu">{{ __('Delete') }}</span>
                                        </a>
                                        <form id="gallery-delete" action="{{ route('galleries.destroy', $gallery) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
            {{ $galleries->links() }}
            <!-- Row -->
            </div>
        </div>
    </div>


@endsection


