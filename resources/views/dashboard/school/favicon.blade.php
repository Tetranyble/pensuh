@extends('dashboard.layouts.dashboard')
@section('title', 'Site Favicon')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Favicon</h4>
                        <form method="POST" action="{{ route('favicons.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="favicon_x">School Favicon
                                                <span class="text-danger">32*32<span  class="text-danger h6">{{$errors->first('favicon_x')}}</span></span>
                                            </label>
                                            <div class="custom-file">
                                                <input name="favicon_x" type="file" class="custom-file-input disabled" id="favicon_x">
                                                <label class="custom-file-label" for="favicon_x">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Update</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


