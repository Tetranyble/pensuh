<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @impersonating($guard = null)
                <li class="sidebar-item text-danger"> <a class="sidebar-link sidebar-link text-danger" href="{{ route('impersonate.leave') }}"
                                             aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                            class="hide-menu">Impersonation</span></a></li>
                <li class="list-divider"></li>
                @endImpersonating
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('dashboard') }}"
                                             aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                @can('master')
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('schools.index') }}"
                                             aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span
                            class="hide-menu">Schools
                                </span></a>
                </li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('system.users') }}"
                                                 aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                class="hide-menu">Users
                                </span></a>
                    </li>
                @endcan
{{--                <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>--}}
                @canany(['teacher', 'admin', 'principal', 'security','form_teacher','student'])
                    <li class="list-divider"></li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('students.index') }}"
                                             aria-expanded="false"><i data-feather="eye" class="feather-icon"></i><span
                            class="hide-menu">Students
                                </span></a>
                </li>
                @endcan
                @canany(['teacher', 'admin', 'principal', 'security','form_teacher'])
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('staff.index') }}"
                                             aria-expanded="false"><i data-feather="eye" class="feather-icon"></i><span
                            class="hide-menu">Staff
                                </span></a>
                </li>
                @endcan
                @canany(['teacher','form_teacher', 'admin', 'principal', 'security','form_teacher', 'vice_principal_admin', 'vice_principal_academy', 'bursar'])
                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('sections.courses',[ 'teacher' => auth()->user()->id, 'section' => '']) }}"
                                                 aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                class="hide-menu">My Courses
                                </span></a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Attendance</span></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                 aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Attendance(s) </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('attendances.create') }}" class="sidebar-link"><span
                                        class="hide-menu">Manual
                                        </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('attendances.automatic') }}" class="sidebar-link"><span
                                        class="hide-menu">Automatic
                                        </span></a>
                            </li>
                        </ul>
                    </li>


                    <li class="list-divider"></li>
                @endcan



                @canany(['admin', 'principal', 'vice_principal_admin', 'vice_principal_academy', 'director'])
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">School Setup</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                             aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                            class="hide-menu">Classes </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('class.create') }}" class="sidebar-link"><span
                                    class="hide-menu">Create
                                        </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('class.index') }}" class="sidebar-link"><span
                                    class="hide-menu">View
                                        </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                             aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                            class="hide-menu">Class Sections </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
{{--                        <li class="sidebar-item"><a href="{{ route('sections.create') }}" class="sidebar-link"><span--}}
{{--                                    class="hide-menu">Create--}}
{{--                                        </span></a>--}}
{{--                        </li>--}}
                        <li class="sidebar-item"><a href="{{ route('sections.index') }}" class="sidebar-link"><span
                                    class="hide-menu">View
                                        </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                             aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span
                            class="hide-menu">Courses/Subjects </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                                <li class="sidebar-item"><a href="{{ route('course.create') }}" class="sidebar-link"><span
                                                            class="hide-menu">Create
                                                                </span></a>
                                                </li>
                        <li class="sidebar-item"><a href="{{ route('course.index') }}" class="sidebar-link"><span
                                    class="hide-menu">View All Courses
                                        </span></a>
                        </li>
                    </ul>
                </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                 aria-expanded="false"><i data-feather="user-plus" class="feather-icon"></i><span
                                class="hide-menu">System Users </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('staff.create') }}" class="sidebar-link"><span
                                        class="hide-menu"> Add Staff
                                        </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('student.create') }}" class="sidebar-link"><span
                                        class="hide-menu"> Add Student
                                        </span></a>
                            </li>

                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                 aria-expanded="false"><i data-feather="dollar-sign" class="feather-icon"></i><span
                                class="hide-menu">Fees </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('fees.create') }}" class="sidebar-link"><span
                                        class="hide-menu">Add Fees
                                        </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('fees.index') }}" class="sidebar-link"><span
                                        class="hide-menu">Fees
                                        </span></a>
                            </li>
                        </ul>
                    </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                             aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span
                            class="hide-menu">Settings </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('schools.create') }}" class="sidebar-link"><span
                                    class="hide-menu"> My School
                                        </span></a>
                        </li>
                    </ul>
                </li>

                @endcanany
                @canany(['admin', 'principal', 'public_relation_officer', 'vice_principal_admin', 'vice_principal_academy'])

                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                 aria-expanded="false"><i data-feather="image" class="feather-icon"></i><span
                                class="hide-menu">Gallery </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('galleries.create') }}" class="sidebar-link"><span
                                        class="hide-menu">Add
                                        </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('galleries.index') }}" class="sidebar-link"><span
                                        class="hide-menu">Galery
                                        </span></a>
                            </li>
                        </ul>
                    </li>
                @endcanany
                @canany([ 'principal', 'vice_principal_academy', 'vice_principal_admin'])
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                 aria-expanded="false"><i data-feather="package" class="feather-icon"></i><span
                                class="hide-menu">Syllabus </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('syllabi.create') }}" class="sidebar-link"><span
                                        class="hide-menu">Add Syllabus
                                        </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('syllabi.index') }}" class="sidebar-link"><span
                                        class="hide-menu">Syllabi
                                        </span></a>
                            </li>
                        </ul>
                    </li>
                @endcanany
                @canany(['admin', 'principal', 'exam_head', 'dean_of_study', 'vice_principal_admin', 'vice_principal_academy'])
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                 aria-expanded="false"><i data-feather="bookmark" class="feather-icon"></i><span
                                class="hide-menu">Exams </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('exams.create') }}" class="sidebar-link"><span
                                        class="hide-menu">Add Exam
                                        </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('exams.index') }}" class="sidebar-link"><span
                                        class="hide-menu">Exams
                                        </span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                 aria-expanded="false"><i data-feather="bookmark" class="feather-icon"></i><span
                                class="hide-menu">Academic Calendar </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('academics.create') }}" class="sidebar-link"><span
                                        class="hide-menu">Add Calendar
                                        </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('academics.index') }}" class="sidebar-link"><span
                                        class="hide-menu">Calendars
                                        </span></a>
                            </li>
                        </ul>
                    </li>
                @endcanany
                @canany(['principal'])
                    <li class="list-divider"></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                                 aria-expanded="false"><i data-feather="activity" class="feather-icon"></i><span
                                class="hide-menu">Psychometric Rating </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="{{ route('psychometrics.create') }}" class="sidebar-link"><span
                                        class="hide-menu">Psychometric
                                        </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route('psychometrics.index') }}" class="sidebar-link"><span
                                        class="hide-menu">Psychometrics
                                        </span></a>
                            </li>
                        </ul>
                    </li>
                @endcanany

{{--                authentication --}}
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('logout') }}" aria-expanded="false"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

