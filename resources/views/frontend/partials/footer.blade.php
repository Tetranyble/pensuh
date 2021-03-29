<!--newsletter-sec end-->
<footer>
    <div class="container">
        <div class="top-footer">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget widget-about"><img src="{{ asset($home->school_logo) }}" alt="">
                        <p>{{ $home->about_school }}</p>
                    </div>
                    <!--widget-about end-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget widget-contact">
                        <ul class="contact-add">
                            <li>
                                <div class="contact-info"><img src="assets/img/icon1.png" alt="">
                                    <div class="contact-tt">
                                        <h4>Call</h4><span><a href="tel:{{ $home->contact_phone }}">{{ $home->contact_phone }}</a></span>
                                    </div>
                                </div>
                                <!--contact-info end-->
                            </li>
                            <li>
                                <div class="contact-info"><img src="assets/img/icon2.png" alt="">
                                    <div class="contact-tt">
                                        <h4>Work Time</h4><span>{{ $home->work_time }}</span>
                                    </div>
                                </div>
                                <!--contact-info end-->
                            </li>
                            <li>
                                <div class="contact-info"><img src="assets/img/icon3.png" alt="">
                                    <div class="contact-tt">
                                        <h4>Address</h4><span>{{ $home->address }}</span>
                                    </div>
                                </div>
                                <!--contact-info end-->
                            </li>
                        </ul>
                    </div>
                    <!--widget-contact end-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget widget-links">
                        <h3 class="widget-title">Quick Links</h3>
                        <ul>
                            <li><a href="{{ route('about') }}" title="">About Us</a></li>
                            <li><a href="{{ route('classes') }}" title="">Our Classes</a></li>
                            <li><a href="{{ route('teachers') }}" title="">School Teachers</a></li>
                            <li><a href="{{ route('event') }}" title="">Recent Events</a></li>
                            <li><a href="{{ route('news') }}" title="">Our News</a></li>
                            <li><a href="{{ route('schedule') }}" title="">Schedule</a></li>
                        </ul>
                    </div>
                    <!--widget-links end-->
                </div>
            </div>
        </div>
        <!--top-footer end-->
        <div class="bottom-footer">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <p>© Copyrights {{ date('Y') }} <a href="{{ route('home') }}">{{ $home->school_name }}</a> All rights reserved</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <ul class="social-links">
                        <li><a href="{{ $home->facebook_handle }}" title=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $home->twitter_handle }}" title=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ $home->instagram_handle }}" title=""><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--bottom-footer end-->
    </div>
</footer>
<!--footer end-->
