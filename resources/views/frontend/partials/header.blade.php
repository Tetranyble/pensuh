<header>
    <div class="container">
        <div class="header-content d-flex flex-wrap align-items-center">
            <div class="logo"><a href="{{ route('home') }}" title=""><img src="{{ asset($home->school_logo) }}" alt=""
                                                                   srcset="{{ asset($home->school_logo) }}"></a></div>
            <!--logo end-->
            <ul class="contact-add d-flex flex-wrap">
                <li>
                    <div class="contact-info"><img src="assets/img/icon1.png" alt="">
                        <div class="contact-tt">
                            <h4>Call</h4><span><a href="tel:{{ $home->contact_phone }}" >{{ $home->contact_phone }}</a></span>
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
            <!--contact-information end-->
            <div class="menu-btn"><a href="#"><span class="bar1"></span> <span class="bar2"></span> <span
                        class="bar3"></span></a></div>
            <!--menu-btn end-->
        </div>
        <!--header-content end-->
        <div class="navigation-bar d-flex flex-wrap align-items-center">
            <nav>
                <ul>
                    <li><a class="{{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}" title="">Home</a></li>
                    <li><a class="{{ (request()->is('/about')) ? 'active' : '' }}" href="{{ route('about') }}" title="">About</a>
                        <ul>
                            <li><a class="{{ (request()->is('/events')) ? 'active' : '' }}" href="{{ route('event') }}" title="">Events</a></li>
                            <li><a class="{{ (request()->is('/schedule')) ? 'active' : '' }}" href="{{ route('schedule') }}" title="">Schedule</a></li>

                        </ul>
                    </li>
                    <li><a class="{{ (request()->is('/classes')) ? 'active' : '' }}" href="{{ route('classes') }}" title="">Classes</a></li>
                    <li><a class="{{ (request()->is('/teachers')) ? 'active' : '' }}" href="{{ route('teachers') }}" title="">Teachers</a></li>
                    <li><a class="{{ (request()->is('/news')) ? 'active' : '' }}" href="{{ route('news') }}" title="">Blog</a></li>
                    <li><a class="{{ (request()->is('/contacts')) ? 'active' : '' }}" href="{{ route('contacts') }}" title="">Contacts</a></li>
                </ul>
            </nav>
            <!--nav end-->
            <ul class="social-links ml-auto">
                <li><a href="{{ $home->facebook_handle }}" title=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{ $home->twitter_handle }}" title=""><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{ $home->instagram_handle }}" title=""><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <!--navigation-bar end-->
    </div>
</header>
<!--header end-->
<div class="responsive-menu">
    <ul>
        <li><a class="{{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}" title="">Home</a></li>
        <li><a class="{{ (request()->is('/about')) ? 'active' : '' }}" href="{{ route('about') }}" title="">About</a></li>
        <li><a class="{{ (request()->is('/events')) ? 'active' : '' }}" href="{{ route('event') }}" title="">Events</a></li>
        <li><a class="{{ (request()->is('/schedule')) ? 'active' : '' }}" href="{{ route('schedule') }}" title="">Schedule</a></li>
        <li><a class="{{ (request()->is('/classes')) ? 'active' : '' }}" href="{{ route('classes') }}" title="">Classes</a></li>
        <li><a class="{{ (request()->is('/teachers')) ? 'active' : '' }}" href="{{ route('teachers') }}" title="">Teachers</a></li>
        <li><a class="{{ (request()->is('/news')) ? 'active' : '' }}" href="{{ route('news') }}" title="">Blog</a></li>
        <li><a class="{{ (request()->is('/contacts')) ? 'active' : '' }}" href="{{ route('contacts') }}" title="">Contacts</a></li>
    </ul>
</div>
