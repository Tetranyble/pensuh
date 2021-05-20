@extends('dashboard.layouts.dashboard')
@section('title', 'Edit fee')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <ul>
            @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
            @endforeach
        </ul>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Course</h4>
                        <form method="POST" action="{{ route('fees.update', $fee) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                            <label for="name">Name
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('name')}}</span></span>
                                            </label>
                                            <input name="name" class="form-control" id="name" type="text"
                                                   placeholder="enter course name" value="{{ old('name', $fee->name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('amount')) ? 'has-error' : ''}}">
                                            <label for="amount">Amount
                                                <span class="text-danger">*<span
                                                        class="text-danger h6">{{$errors->first('amount')}}</span></span>
                                            </label>
                                            <input name="amount" class="form-control" id="amount" type="number"
                                                   placeholder="enter fee amount" value="{{ old('amount', $fee->amount) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('school_type_id')) ? 'has-error' : ''}}">
                                            <label for="school_type_id">School Type
                                                <span class="text-danger"><span
                                                        class="text-danger h6">{{$errors->first('school_type_id')}}</span></span>
                                            </label>
                                            <select name="school_type_id" class="form-control" id="school_type_id" type="text">
                                                <option value="" >select school type</option>
                                                @forelse($schoolTypes as $type)
                                                    <option
                                                        {{ old('school_type_id', $fee->school_type_id) == $type->id ? "selected" : "" }} value="{{ $type->id }}">{{ $type->name }}</option>
                                                @empty
                                                    <option value="">No data</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('description')) ? 'has-error' : ''}}">
                                            <label for="description">Description
                                                <span class="text-danger"><span
                                                        class="text-danger h6">{{$errors->first('description')}}</span></span>
                                            </label>
                                            <input name="description" class="form-control" id="description" type="text"
                                                   placeholder="enter fee description" value="{{ old('description', $fee->description) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Update</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
@endsection

