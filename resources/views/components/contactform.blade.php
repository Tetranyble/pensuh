<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-sec">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="newsz-ltr-text">
                        <h2>Join us<br>and stay tuned!</h2><a href="{{ route('contact') }}" title="" class="btn-default">Join Us <i
                                class="fa fa-long-arrow-alt-right"></i></a>
                    </div>
                    <!--newsz-ltr-text end-->
                </div>
                <div class="col-lg-8">
                    <form class="newsletter-form" method="POST" action="{{ route('contacts.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                    <label class="" for="name">
                                        <span class="required"> <span  class="text-danger h6">{{$errors->first('name')}}</span></span>
                                    </label>
                                    <input type="text" name="name" placeholder="Name" value="{{old('name')}}"></div>
                                <!--form-group end-->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{($errors->has('name')) ? 'has-error' : ''}}">
                                    <label class="" for="email">
                                        <span class="required"> <span  class="text-danger h6">{{$errors->first('email')}}</span></span>
                                    </label>
                                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                                </div>
                                <!--form-group end-->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group select-tg">
                                    <label class="" for="classes_id">
                                        <span class="required"> <span  class="text-danger h6">{{$errors->first('classes_id')}}</span></span>
                                    </label>
                                    <select name="classes_id">
                                        @forelse($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @empty
                                            <option>No classes</option>
                                        @endforelse
                                    </select>
                                </div>
                                <!--form-group end-->
                            </div>
                            <div class="col-md-12">
                                <label class="" for="message">
                                    <span class="required"><span  class="text-danger h6">{{$errors->first('message')}}</span></span>
                                </label>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Message">{{old('message')}}</textarea>
                                </div>
                                <!--form-group end-->
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>

                    </form>
                    <!--newsletter-form end-->
                </div>
            </div>
        </div>
        <!--newsletter-sec end-->
    </div>
</section>
