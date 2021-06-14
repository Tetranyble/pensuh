<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="{{ $home->school_colour }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="school, school management, digital school management system">
    <meta name="description" content="{{ $home->about_school }}">
    <link rel="canonical" href="//{{ $home->domain }}" />
    <title>{{ $home->school_name. ' - ' . $home->about_school }}</title>
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:site_name" content="{{ $home->school_name }}"/> <!-- website name -->
    <meta property="og:site" content="//{{ $home->domain }}"/> <!-- website link -->
    <meta property="og:title" content="Pensuh - Modern School Management System"/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="{{ $home->about_school }}"/> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="/assets/images/pensuh-m-logo.png"/> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="//{{ $home->domain }}"/> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article"/>
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/'. $home->favicon) }}" />
    <!--bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/index.css') }}">


</head>

<body>
<!--Start Preloader-->
<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell align-middle">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
</div>
<!--End Preloader-->
<!--start header-->
<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="logo" href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"><i class="icofont-navigation-menu"></i></span>
                </button>
                <!-- navbar links -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-scroll-nav="0">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="1">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="4">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="6">Contact</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--end header-->
<!--start home area-->
<section id="home-area" data-scroll-index="0">
    <div class="container">
        <div class="row">
            <!--start caption content-->
            <div class="col-md-6">
                <div class="caption d-table">
                    <div class="d-table-cell align-middle">
                        <h1>Digital School Management without Stress.</h1>
                        <p>
                            Manage and automate attendance, admission, assessment, payment, performance, generate report cards – all from one easy-to-use app.
                        </p>
                        <a href="#contact-area">Create School</a>
                    </div>
                </div>
            </div>
            <!--end caption content-->
            <!--start caption image-->
            <div class="col-md-6">
                <div class="caption-img text-right">
                    <img src="{{ asset('assets/images/student2.png') }}" class="img-fluid" alt="">
                </div>
            </div>
            <!--end caption image-->
        </div>
    </div>
    <div class="pattern-bg"></div>
</section>
<!--end home area-->
<!--start feature area-->
<section id="feature-area" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <div class="section-heading text-center">
                    <h2>Product Features</h2>
                    <p>Pensuh is a Cloud based School Management Software System that combines all features necessary for running a modern Nursery, Primary, or Secondary school into one system that is simple, flexible, and reliable.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!--start feature single-->
            <div class="col-lg-3 col-md-6">
                <div class="feature-single text-center">
                    <div class="icon">
                        <i class="icon-cloud1"></i>
                    </div>
                    <h4>Simple</h4>
                    <p>Pensuh is simple, intuitive, and mobile friendly. The intuitive interface negates the need for constant training and maximises usage.</p>
                </div>
            </div>
            <!--end feature single-->
            <!--start feature single-->
            <div class="col-lg-3 col-md-6">
                <div class="feature-single text-center">
                    <div class="icon">
                        <i class="icon-coding"></i>
                    </div>
                    <h4>Flexible</h4>
                    <p>Every school is different. Pensuh is designed to support Nursery, primary, secondary Schools of all sizes and structure, with customizable grading, report card systems and much more.</p>
                </div>
            </div>
            <!--end feature single-->
            <!--start feature single-->
            <div class="col-lg-3 col-md-6">
                <div class="feature-single text-center">
                    <div class="icon">
                        <i class="icon-box"></i>
                    </div>
                    <h4>Reliable</h4>
                    <p>Pensuh is built with the best technological tools, database, standards and platforms, guaranteeing security, speed and a 99.99% uptime.</p>
                </div>
            </div>
            <!--end feature single-->
            <!--start feature single-->
            <div class="col-lg-3 col-md-6">
                <div class="feature-single text-center">
                    <div class="icon">
                        <i class="icon-avatar"></i>
                    </div>
                    <h4>User Friendly</h4>
                    <p>Designed to empower teachers and parents collaboration.</p>
                </div>
            </div>
            <!--end feature single-->
        </div>
    </div>
</section>
<!--end feature area-->
<!--start video area-->
<section id="video-area" data-scroll-index="4">
    <div class="container">
        <div class="row">
            <!--start video content-->
            <div class="col-md-6">
                <div class="video-cont">
                    <h2>All-In-One Digital School Solutions</h2>
                    <p>Pensuh's features are geared towards improving oversight and reducing workload while increasing efficiency.</p>
                </div>
            </div>
            <!--end video content-->
            <!--start video box-->
            <div class="col-md-6">
                <div class="video-box">
                    <div class="d-table text-center">
                        <div class="d-table-cell align-middle">
                            <a class="popup-video mfp-iframe" href="www.youtube.com/watchb450.html?v=om4qTKMuPPs"><i class="icofont-ui-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end video box-->
        </div>
    </div>
</section>
<!--end video area-->
<!--start about area-->
<section id="about-area" class="bg-gray" data-scroll-index="2">
    <div class="container">
        <div class="row">
            <!--start about image-->
            <div class="col-md-6">
                <div class="about-img text-center">
                    <img src="{{ asset('assets/images/administartion.png') }}" class="img-fluid" alt="Image">
                </div>
            </div>
            <!--end about image-->
            <!--start about info-->
            <div class="col-md-6">
                <div class="about-info">
                    <h2>Teachers & Administrators</h2>
                    <p>Pensuh's features are geared towards improving oversight and reducing workload while increasing efficiency.</p>
                    <ul>
                        <li><i class="icofont-check"></i> Reduced workload, resulting in massive time savings for entire staff.
                            Instantly generate report cards from exams, tests, and attendance scores.</li>
                        <li><i class="icofont-check"></i> Better insight into, and control over school activities with easy and fast access to school records.</li>
                        <li><i class="icofont-check"></i> Elimination of human error and fraud.</li>
                        <li><i class="icofont-check"></i> Increased revenue from online fees payment.</li>
                        <li><i class="icofont-check"></i> Reduced cost due to savings on paper use.</li>
                        <li><i class="icofont-check"></i> Promotion of a technology-oriented culture</li>
                    </ul>
                </div>
            </div>
            <!--end about info-->
        </div>
    </div>
</section>
<!--end about area-->
<section id="about-area" class="bg-gray" data-scroll-index="3">

    <div class="container">
        <div class="row">
            <!--start about info-->
            <div class="col-md-6">
                <div class="about-info">
                    <h2>Students and Parents</h2>
                    <p>Pensuh School Portal, via a comprehensive dashboard and robust notification systems, provides you with easy access to the information you need.</p>
                    <ul>
                        <li><i class="icofont-check"></i> Well-informed and involved parents due to effective communication between the school, parents and students.
                        </li>
                        <li><i class="icofont-check"></i>Improved students outcomes by improving digital literacy and deepening student learning with technology.</li>
                        <li><i class="icofont-check"></i> Fast and painless fees payment over mobile or PC.</li>
                        <li><i class="icofont-check"></i> Easy access to students academic and financial records, including attendance, homework, timetable, grades, fees, events and holidays, et cetera.</li>
                        <li><i class="icofont-check"></i>Improved child safety via attendance and pick-up updates.</li>
                    </ul>
                </div>
            </div>
            <!--end about info-->
            <!--start about image-->
            <div class="col-md-6">
                <div class="about-img text-center">
                    <img src="{{ asset('assets/images/administartion1.png') }}" class="img-fluid" alt="Image">
                </div>
            </div>
            <!--end about image-->
        </div>
    </div>
</section>
<!--end about area-->


<!--start contact area-->
<section id="contact-area" data-scroll-index="6">
    <div class="container">
        <div class="row">
            <!--start section heading-->
            <div class="col-lg-6 col-md-8">

            </div>
            <!--end section heading-->
        </div>
        <div class="row">
            <!--start contact form-->
            <div class="col-md-7">
                <div class="contact-form">
                    <form id="ajax-contact" action="{{route('contacts.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name*" required="required" data-error="name is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email*" required="required" data-error="valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="phone*" required="required" data-error="phone is required">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="subject*" required="required" data-error="subject is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="message" rows="10" placeholder="Write Your Message*" required="required" data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <button type="submit">Submit</button>
                        <div class="messages alert-success"></div>
                    </form>
                </div>
            </div>
            <!--end contact form-->
            <!--start contact image-->
            <div class="col-md-5">
                <div class="contact-img" >
                    <div class="section-heading">
                        <h2>Contact With Us</h2>
                        <p style="font-size: 1.2rem;">It’s always the right time to do the right thing. We’ve made switching to Pensuh easy</p>
                    </div>
                    <h5>Address:</h5>
                    <p style="font-size: 1.2rem;">Elzazi complex, Opposite Wesham petrol station along gbalajam/Akpajo road, Woji, Port Harcourt</p>
                    <p style="font-size: 1.2rem;">Ochendu Plaza Egbema Ozubulu, Opposite Post Office Ekwusigo L.G.A, Anambra State</p>

                    <p style="font-size: 1.2rem;"><a href="tel:+2348077471000">support: +2348077471000</a></p>
                    <p style="font-size: 1.2rem;"><a href="tel:+2348122219523">Business: +2348122219523</a></p>
                    <h5>Email:</h5>
                    <p style="font-size: 1.2rem;"><a href="mailto:hello@pensuh.com">hello@pensuh.com</a></p>
                </div>
            </div>
            <!--end contact image-->
        </div>
    </div>

</section>
<!--end contact area-->
<!--start footer-->
<footer id="footer" class="bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="footer-social">
                    <ul>
                        <li><span>Follow Us:</span></li>
                        <li><a href="{{ $home->facebook_handle }}"><i class="icofont-facebook"></i></a></li>
                        <li><a href="{{ $home->twitter_handle }}"><i class="icofont-twitter"></i></a></li>
                        {{--<li><a href="#"><i class="icofont-google-plus"></i></a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-7">
                <div class="copyright-text text-right">
                    <p>&copy; Copy 2020. All Rights Reserved By <a href="/">{{ config('app.name') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end footer-->

<!--main js-->
<script src="{{ asset('assets/js/index.js') }}"></script>
</body>
</html>
