@extends('main.layouts.main')
@section('title', 'Pensuh – Saas & Modern School Software Management Solution')
@section('content')
<div class="box-wrapper">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="d-loader">
                <img src="images/pendulum.gif" alt="Pensuh">
            </div>
        </div>
    </div>
    <!-- Loader -->
    <!-- Nav Bar -->
    <header id="master-head" class="navbar menu-absolute menu-center">
        <div class="container">
            <div id="main-logo" class="logo-container">
                <a class="logo" href="{{ route('main.index') }}">
                    <img src="{{ asset('assets/images/pensuh-web.png') }}" class="logo-dark" alt="Pensuh">
                    <img src="{{ asset('assets/images/pensuh-web.png') }}g" class="logo-light" alt="Pensuh">
                </a>
            </div>
            <div class="menu-toggle-btn">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="burger-lines">
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
            <div id="navigation" class="nav navbar-nav navbar-main">
                <ul id="main-menu" class="menu-primary">
                    <li class="menu-item  active">
                        <a href="/">Home</a>
                    </li>
                    <li class="menu-item ">
                        <a href="#">Features</a>

                    </li>
                    <li class="menu-item ">
                        <a href="#">Blogs</a>
                    </li>
                    <li class="menu-item ">
                        <a href="#">About Us</a>
                    </li>
                    <li class="menu-item ">
                        <a href="#">Pricing</a>

                    </li>
                </ul>
            </div>
            <div class="navbar-right">
                <div class="menu-button">
                    <a href="#" target="_blank">
                        <div class="btn btn-primary">sign in</div>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- Nav Bar -->
    <!-- Main Wrapper -->
    <div id="main-wrapper" class="page-wrapper">
        <div class="page-header section-padding full-height dc-five">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="image-wrapper">
                            <img src="images/default-color/erp-system-img.png" alt="" />
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-6">
                        <div class="heading-wrapper with-separator wow fadeInLeft" data-wow-delay="0.2s">
                            <h1>School Management <span>ERP Systems</span></h1>
                        </div>
                        <div class="text-wrapper wow fadeInLeft" data-wow-delay="0.4s">
                            <p>Manage classrooms, observe students, collect fees, generate report cards, and stay in touch with families – all from one easy-to-use app.</p>
                        </div>
                        <div class="btn-wrapper wow fadeInUp" data-wow-delay="0.4s">
                            <a class="btn btn-primary" href="#">Get started</a>
                            <a class="btn btn-outline-primary" href="#"><i class="fas fa-play-circle"></i>Watch Video</a>
                        </div>
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
        </div>
        <!-- Page Header -->
        <div class="features-section section-padding">
            <div class="container">
                <div class="row clearfix align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <div class="heading-wrapper with-separator">
                            <h2 class="h1">Why <span>Pensuh ERP</span> Systems?</h2>
                        </div>
                        <!-- End Heading -->
                        <div class="text-wrapper">
                            <p class="lead-text">Pensuh is a Cloud based School Management Software System. </p>
                            <p>It combines all features necessary for running a modern Nursery, Primary, or Secondary school into one system that is simple, flexible, and reliable.</p>
                        </div>
                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-primary">Discover More</a>
                        </div>
                        <div class="d-lg-none d-xl-block empty-space-30"></div>
                    </div><!-- End Col -->
                    <div class="col-lg-6">
                        <div class="row inner-row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="features-block theme-one wow fadeInUp">
                                    <div class="inner-box">
                                        <div class="icon">
                                            <img class="normal" src="images/default-color/icon-2.svg" alt="">
                                            <img class="hover" src="images/default-color/icon-2-light.svg" alt="">
                                        </div>
                                        <div class="text">
                                            <h4>Easy to setup and use</h4>
                                            <p>Sign up, create school and hook-up domain. Done!</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Col -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="features-block theme-one wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="inner-box">
                                        <div class="icon">
                                            <img class="normal" src="images/default-color/icon-24.svg" alt="">
                                            <img class="hover" src="images/default-color/icon-24-light.svg" alt="">
                                        </div>
                                        <div class="text">
                                            <h4>Provides Custom Dashboards</h4>
                                            <p>Our dashboard is simple, intuitive, and mobile friendly. The intuitive interface negates the need for constant training and maximises usage</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Col -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="features-block theme-one wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="inner-box">
                                        <div class="icon">
                                            <img class="normal" src="images/default-color/icon-4.svg" alt="">
                                            <img class="hover" src="images/default-color/icon-4-light.svg" alt="">
                                        </div>
                                        <div class="text">
                                            <h4>Access data anywhere anytime</h4>
                                            <p>The software can be accessed from anywhere and at any time. A record of everything can be kept due to its easy accessibility. It also facilitates providing immediate information to all the stakeholders. All they require is the credentials of the online education ERP portal.</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Col -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="features-block theme-one wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="inner-box">
                                        <div class="icon">
                                            <img class="normal" src="images/default-color/icon-25.svg" alt="">
                                            <img class="hover" src="images/default-color/icon-25-light.svg" alt="">
                                        </div>
                                        <div class="text">
                                            <h4>A cost-effective solution</h4>
                                            <p>Cheap and affordable</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Col -->
                        </div><!-- End Row -->
                    </div>
                    <!-- End Col -->
                </div><!-- End Row -->
            </div>
        </div>
        <!-- Features Section -->
        <div class="section-padding border-top">
            <div class="container">
                <div class="row clearfix align-items-center">
                    <div class="col-lg-6">
                        <div class="image-wrapper">
                            <img src="images/default-color/erp-mobileapp-features.png" alt="">
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-6">
                        <div class="heading-wrapper with-separator">
                            <h2 class="h1">App fledged with <span>features</span></h2>
                        </div><!-- End Heading -->
                        <div class="text-wrapper">
                            <p>Simple, yet comprehensive</p>
                            <ul class="list-style-one two-col">
                                <li><strong>School Calendar</strong></li>
                                <li><strong>Attendance Report</strong></li>
                                <li><strong>Notice-board</strong></li>
                                <li><strong>Exam Report</strong></li>
                                <li><strong>Notifications</strong></li>
                                <li><strong>Library</strong></li>
                                <li><strong>Institution Fees</strong></li>
                                <li><strong>Gallery</strong></li>
                                <li><strong>News</strong></li>
                                <li><strong>Events</strong></li>
                            </ul>
                        </div>
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
        </div>
        <div class="benefits-section section-padding style-dark dark-bg gradient-heading-bg">
            <div class="container">
                <div class="row clearfix justify-content-center">
                    <div class="col-lg-8">
                        <div class="heading-wrapper text-center">
                            <h2 class="h1"><span>Benefits</span> of Pensuh ERP Software</h2>
                            <div class="lead-text">
                                <p>The benefits of the school ERP are as follows:</p>
                            </div>
                        </div><!-- End Heading -->
                        <div class="empty-space-60 clearfix"></div>
                    </div><!-- End Col -->
                </div><!-- End Row -->
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6">
                        <div class="features-block theme-two wow fadeInUp">
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Best Student-Teacher Collaboration</h4>
                                    <p>Using the cloud based school ERP leads to student-teacher collaboration beyond the classroom. This increases the interaction between the staff and the students. The interaction happens over the application (online) where the teacher is available to answer queries of the students. It also facilitates a friendly atmosphere in academics.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="features-block theme-two wow fadeInUp" data-wow-delay="0.2s">
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Complete automation for smarter decisions</h4>
                                    <p>School Management solution helps in organizing various aspects of school system including student, staff, admission, time table, examination, fees, reporting and so on. The system helps administrators to access, manage, and analyze data and processes for quick and well-informed decision-making.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="features-block theme-two wow fadeInUp" data-wow-delay="0.4s">
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Paperless Administration</h4>
                                    <p>Stationary right from the paper files to records is saved when the ERP system is used for performing routine administrative tasks. It leads to saving the natural resources and keeps a digital track of the data. Also it does not create a mess of the records to be maintained.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="features-block theme-two wow fadeInUp">
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Productivity</h4>
                                    <p>The school management information system boosts the productivity of the institute. The reason for the increase in productivity is decreased time to maintain the track records and increased accuracy in organizing the data. Less time leads to keeping the institute focused on the productivity of the school.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="features-block theme-two wow fadeInUp" data-wow-delay="0.2s">
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Performance/Reduces Workload</h4>
                                    <p>The workload upon the staff members is reduced as the teachers need to be technology driven. This leads them to work upon the ERP and send out the required data to the students and their parents over the system. It reduces the workload from the teachers and saves time.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="features-block theme-two wow fadeInUp" data-wow-delay="0.4s">
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Information Accessibility</h4>
                                    <p>The software can be accessed from anywhere and at any time. A record of everything can be kept due to its easy accessibility. It also facilitates providing immediate information to all the stakeholders. All they require is the credentials of the online education ERP portal.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
        </div>
        <!-- Benefits Section -->
        <div class="module-section section-padding">
            <div class="container">
                <div class="row clearfix justify-content-center">
                    <div class="col-lg-8">
                        <div class="heading-wrapper with-separator text-center">
                            <h2 class="h1">Pensuh Provides <span>Premium Modules</span></h2>
                            <div class="lead-text">
                                <p>Core Modules</p>
                            </div>
                        </div>
                        <!-- End Heading -->
                    </div><!-- End Col -->
                </div><!-- End Row -->
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-1.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Fee Collection</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="0.2s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-2.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Library</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="0.4s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-3.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Human Resource</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="0.6s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-4.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Academic</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="0.8s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-5.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Examination</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="1s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-6.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Student Info</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-7.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Expenses</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="0.2s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-8.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Attendance</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="0.4s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-9.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Inventory</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="0.6s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-10.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Communicate</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="0.8s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-11.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Home work</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp" data-wow-delay="1s">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-12.svg" alt="">
                                </div>
                                <div class="text">
                                    <h4>Upload Content</h4>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
        </div>
        <div class="pricing-section section-padding">
            <div class="container">
                <div class="row justify-content-center clearfix">
                    <div class="col-lg-8">
                        <div class="heading-wrapper text-center with-separator">
                            <h2 class="h1">Pricing Plans</h2>
                            <div class="lead-text">
                                <p></p>
                            </div>
                        </div><!-- End Heading -->
                    </div><!-- End Col -->
                </div><!-- End Row -->
                <div class="row pricing-plans-two clearfix">
                    <div class="col-lg-4 col-12">
                        <div class="price-card text-center wow fadeInLeft">
                            <div class="plan-cost-wrapper">
                                <div class="plan-cost">
                                    <span class="plan-cost-prefix">$</span>Free
                                </div>
                                <div class="plan-validity">per month</div>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title">Start-Up</h3>
                            </div>
                            <div class="card-body">
                                <div class="desc">
                                    <p></p>
                                </div>
                                <ul class="pricing-feature-list">
                                    <li>Easy Customizable</li>
                                    <li>Full Support Service</li>
                                    <li>Full User license</li>
                                    <li class="">Reports & Billing</li>
                                    <li>100Mb Storage</li>
                                    <li>One subdomain</li>
                                    <li class="disabled">Hook up main school domain</li>
                                </ul>
                                <a href="#" class="btn btn-secondary">Purchase Now</a>
                            </div>
                        </div><!-- End Price card -->
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-12">
                        <div class="price-card popular text-center wow fadeInUp">
                            <div class="plan-cost-wrapper">
                                <div class="plan-cost">
                                    <span class="plan-cost-prefix">$</span>Request
                                </div>
                                <div class="plan-validity">per month</div>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title">Advanced</h3>
                            </div>
                            <div class="card-body">
                                <div class="desc">
                                    <p></p>
                                </div>
                                <ul class="pricing-feature-list">
                                    <li>Easy Customizable</li>
                                    <li>Full Support Service</li>
                                    <li>Full User license</li>
                                    <li class="">Reports & Billing</li>
                                    <li>2000Mb Storage+</li>
                                    <li>One subdomain</li>
                                    <li class="">Hook up main school domain</li>
                                    <li class="">Request new feature</li>
                                </ul>
                                <a href="#" class="btn btn-primary">Purchase Now</a>
                            </div>
                        </div><!-- End Price card -->
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-12">
                        <div class="price-card text-center wow fadeInRight">
                            <div class="plan-cost-wrapper">
                                <div class="plan-cost">
                                    <span class="plan-cost-prefix">$</span>Request
                                </div>
                                <div class="plan-validity">per month</div>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title">Premium</h3>
                            </div>
                            <div class="card-body">
                                <div class="desc">
                                    <p></p>
                                </div>
                                <ul class="pricing-feature-list">
                                    <li>Easy Customizable</li>
                                    <li>Full Support Service</li>
                                    <li>Full User license</li>
                                    <li class="">Reports & Billing</li>
                                    <li>1000Mb Storage</li>
                                    <li>One subdomain</li>
                                    <li class="">Hook up main school domain</li>
                                </ul>
                                <a href="#" class="btn btn-secondary">Purchase Now</a>
                            </div>
                        </div><!-- End Price card -->
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
        </div>
        <!-- Pricing Section -->
        <!-- Module Section -->
        <div class="testimonial-section style-two section-padding">
            <div class="container">
                <div class="row clearfix style-dark">
                    <div class="col-lg-8">
                        <div class="heading-wrapper">
                            <h2 class="h1">Happy Clients <span>Feedback</span></h2>
                            <div class="lead-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis finibus mi id elit gravida, quis tincidunt purus fringilla. Aenean convallis a neque non pellentesque.</p>
                            </div>
                        </div><!-- End Heading -->
                    </div><!-- End Col -->
                </div><!-- End Row -->
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="client-testimonial theme-two">
                            <div class="testimonial-slider">
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            Cum et essent similique. Inani propriae menandri sed in. Pericula expetendis has no, quo populo forensibus contentiones et, nibh error in per. Vis in tritani debitis delicatissimi, error omnesque invenire usu ex, qui illud nonumes ad.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Andy Sant</h5>
                                            <p>Founder Coinpool</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            It's all good. I am really satisfied with software. Pericula expetendis has no, quo populo forensibus contentiones et, nibh error in per. Vis in tritani debitis delicatissimi, error omnesque invenire usu ex, qui illud nonumes ad.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Dan Kaul</h5>
                                            <p>IT Consultant</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            Pericula expetendis has no, quo populo forensibus contentiones et, nibh error in per. Vis in tritani debitis delicatissimi, error omnesque invenire usu ex, qui illud nonumes ad. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sodales dictum viverra.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Saru Matt</h5>
                                            <p>Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in lacus consectetur, fermentum nisi vel, aliquet erat. In hac habitasse platea dictumst. Orci varius natoque penatibus et magnis dis parturient montes.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Yommi Pat</h5>
                                            <p>Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            Nam rutrum, eros nec consequat eleifend, quam est sodales mauris, eget dignissim lacus sem at erat. Vivamus eget semper nibh. Nullam dignissim lectus metus, eget dapibus massa vehicula et.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Shreyn S</h5>
                                            <p>Data Science Enthusiastic</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Testimonial Slider -->
                        </div>
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
        </div>

        <!-- Testimonial Section -->
        <div class="companies-section section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="companies-logo grid-view">
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-1.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-2.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-3.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-4.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-5.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-4.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-6.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-5.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-2.png" alt=""></div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper"><img src="images/company-logo-7.png" alt=""></div>
                            </div>
                        </div>
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
        </div>
        <!-- companies Section -->
    </div>
    <!-- Main Wrapper -->
    <footer class="site-footer footer-theme-two">
        <div class="container">
            <div class="main-footer style-dark">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="widget">
                            <div class="text-widget">
                                <div class="about-info">
                                    <div class="image-wrapper">
                                        <img src="{{ asset('assets/images/pensuh-web.png') }}" alt="" />
                                    </div>
                                </div>
                                <div class="newsletter-form style-two align-left">
                                    <h3>Sign up and receive the latest news via email.</h3>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="EmailInput" placeholder="Enter email address" required="">
                                        </div>
                                        <button type="submit">Subscribe Now!</button>
                                    </form>
                                </div>
                                <div class="social-media-links">
                                    <h3>Follow Us:</h3>
                                    <ul>
                                        <li><a target="_blank" href="https://web.facebook.com/pensuhH"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a target="_blank" href="https://www.linkedin.com/company/pensuh"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a target="_blank" href="https://twitter.com/pensuh"><i class="fab fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="https://www.instagram.com/pensuhh"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- End Widget -->
                    </div><!-- End Col -->
                    <div class="col-lg-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h3 class="title">Contact Inforamtion</h3>
                            </div>
                            <div class="text-widget">
                                <div class="contact-info theme-two">
                                    <ul>
                                        <li class="address-field"><label>Anambra State</label>Ochendu Plaza Egbema Ozubulu, Opposite Post Office Ekwusigo L.G.A, Anambra State</li>
                                        <li class="address-field"><label>Port Harcourt</label>Elzazi complex, Opposite Wesham petrol station along gbalajam/Akpajo road, Woji</li>
                                        <li class="email-field">hello@pensuh.com</li>
                                        <li class="phone-field">+234 (0) 8077-471000</li>
                                        <li class="phone-field">+447 449-591458</li>

                                    </ul>
                                </div>

                            </div>
                        </div><!-- End Widget -->
                    </div><!-- End Col -->
                    <div class="col-lg-3">
                        <div class="widget">
                            <div class="widget-title">
                                <h3 class="title">Useful Links</h3>
                            </div>
                            <div class="text-widget">
                                <div class="footer-nav">
                                    <ul>
                                        <li><a href="#">Trust & Safety</a></li>
                                        <li><a href="#">Cookie Policy</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms of Service</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- End Widget -->
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
            <div class="copyright-bar style-dark">
                <div class="copyright-text text-center">
                    © Copyright Pensuh {{ date("Y") }}. Made with <i class="fas fa-heart"></i> by <a href="/" target="_blank"><strong>Pensuh</strong></a>.
                </div>
            </div>
        </div>
    </footer>
    <!-- Main Footer -->
    <div id="theme-option" class="option-panel d-none">
        <h3>Select Your Color</h3>
        <ul class="pattern-color-list">
            <li><a href="#" data-url="default-color" class="default-color active"></a></li>
            <li><a href="#" data-url="orange-color" class="orange-color"></a></li>
            <li><a href="#" data-url="green-color" class="green-color"></a></li>
        </ul>
        <h3>RTL/LTR Option</h3>
        <div class="layout-option">
            <a href="#" class="btn btn-secondary btn-small enable rtl-version">RTL</a>
            <a href="#" class="btn btn-secondary btn-small ltr-version">LTR</a>
        </div>
        <div class="switcher-btn">
            <a href="#" class="settings">
                <i class="mdi mdi-cog-outline mdi-spin"></i>
            </a>
        </div>
    </div>
</div>
<!-- box-wrapper -->
<div class="overlay overlay-search">
    <div class="close-search">
        <span class="lines"></span>
    </div>
    <div class="container">
        <form  method="post">
            <div class="form-group">
                <input type="search" class="form-control" name="SearchInput" placeholder="Search…">
                <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<!--search-form-->
@endsection
