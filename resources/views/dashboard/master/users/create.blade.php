@extends('dashboard.layouts.dashboard')
@section('title', 'Staff Onboarding')
@section('dashboard')
    <div class="container-fluid">
        @include('components.flash-message')
        <ul>
            @foreach($errors->all() as $message)
                <li class="text-danger">{{ $message }}</li>
            @endforeach
        </ul>
        <div class="row">

            <form id="staffForm" action="{{ route('system.users.store') }}" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-light">You're now create admin account for: <b class="bold">{{ $school->school_name }}</b></h4>

                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="school" value="{{ $school->school_name }}"/>
                                    <input type="hidden" name="alias" value="{{ $school->alias }}"/>
                                    <input type="hidden" name="school_id" value="{{ $school->id }}"/>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('firstname')) ? 'has-error' : ''}}">
                                            <label for="firstname">First Name
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('firstname')}}</span></span>
                                            </label>
                                            <input name="firstname" class="form-control" id="firstname" type="text"
                                                   placeholder="enter your firstname" value="{{ old('firstname') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('middlename')) ? 'has-error' : ''}}">
                                            <label for="middlename">Middle Name
                                                <span class="text-danger">(optional)<span  class="text-danger h6">{{$errors->first('middlename')}}</span></span>
                                            </label>
                                            <input name="middlename" class="form-control" id="middlename" type="text"
                                                   placeholder="enter your middle name" value="{{ old('middlename') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('lastname')) ? 'has-error' : ''}}">
                                            <label for="lastname">Last Name
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('lastname')}}</span></span>
                                            </label>
                                            <input name="lastname" class="form-control" id="lastname" type="text"
                                                   placeholder="enter your lastname" value="{{ old('lastname') }}">
                                        </div>
                                    </div>
                                    {{--                                        added for brevity--}}
                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('email')) ? 'has-error' : ''}}">
                                            <label for="email">Email
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                            </label>
                                            <input name="email" class="form-control" id="email" type="email"
                                                   placeholder="enter your school email" value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('phone')) ? 'has-error' : ''}}">
                                            <label for="phone">Phone
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('phone')}}</span></span>
                                            </label>
                                            <input name="phone" class="form-control" id="phone" type="number"
                                                   placeholder="enter your mobile number" value="{{ old('phone') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{($errors->has('address')) ? 'has-error' : ''}}">
                                            <label for="address">Address
                                                <span class="text-danger"> *<span  class="text-danger h6">{{$errors->first('address')}}</span></span>
                                            </label>
                                            <input name="address" class="form-control" id="address" type="text"
                                                   placeholder="enter where you address" value="{{ old('address') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        $(function() {
            jQuery(document).bind("keyup keydown", function(e){
                if(e.ctrlKey && e.keyCode == 80){
                    console.log('hello world')
                    var opt = {
                        margin: 0,
                        filename: 'teachersignupform.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 1 },
                        jsPDF: { unit: 'in', format: 'A4', orientation: 'portrait' }
                    };
                    html2pdf().from(document.getElementById('staffForm')).set(opt).save();
                }
            });

        });
    </script>
    @parent
@endsection
