@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getname();

    $url = url()->current();

    $settings = \App\Models\GeneralSettings::find(1);
    $classes = \App\Models\Classes::all();
@endphp


<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color" style="min-height: 900px">
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href=""><img src="{{ isset($settings->logo) ? asset($settings->logo) : '' }}" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">

            <li class="nav-item {{ $route == 'admin.dashboard' ? 'menu-active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ $route == 'admin.dashboard' ? 'menu-active' : '' }}"><i
                        class="flaticon-dashboard"></i><span>Dashboard</span></a>
            </li>

            @role('admin')
                <li class="nav-item {{ $route == 'role.view' ? 'menu-active' : '' }}">
                    <a href="{{ route('role.view') }}" class="nav-link {{ $route == 'role.view' ? 'menu-active' : '' }}"><i
                            class="fas fa-check"></i><span>Roles </span></a>
                </li>
            @endrole
            @if(auth()->user()->hasPermission('app.web.index'))

                <li
                    class="nav-item sidebar-nav-item
                {{ $route == 'admin.frontend.general_settings' ? 'menu-active' : '' }}
                {{ $route == 'admin.frontend.banner' ? 'menu-active' : '' }}
                {{ $route == 'admin.frontend.message' ? 'menu-active' : '' }}
                {{ $route == 'admin.frontend.notice' ? 'menu-active' : '' }}
                {{ $route == 'admin.frontend.school' ? 'menu-active' : '' }}
                {{ $route == 'admin.frontend.event' ? 'menu-active' : '' }}
                {{ $route == 'admin.frontend.gallery' ? 'menu-active' : '' }}
                {{ $route == 'admin.frontend.social' ? 'menu-active' : '' }}
                {{ $route == 'admin.message' ? 'menu-active' : '' }}
            ">
                    <a href="#"
                        class="nav-link
                    {{ $route == 'admin.frontend.general_settings' ? 'menu-active' : '' }}
                    {{ $route == 'admin.frontend.banner' ? 'menu-active' : '' }}
                    {{ $route == 'admin.frontend.message' ? 'menu-active' : '' }}
                    {{ $route == 'admin.frontend.notice' ? 'menu-active' : '' }}
                    {{ $route == 'admin.frontend.school' ? 'menu-active' : '' }}
                    {{ $route == 'admin.frontend.event' ? 'menu-active' : '' }}
                    {{ $route == 'admin.frontend.gallery' ? 'menu-active' : '' }}
                    {{ $route == 'admin.frontend.social' ? 'menu-active' : '' }}
                    {{ $route == 'admin.message' ? 'menu-active' : '' }}
                "><i
                            class="fas fa-home"></i><span>Website Settings</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                    {{ $route == 'admin.frontend.general_settings' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.frontend.banner' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.frontend.message' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.frontend.notice' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.frontend.school' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.frontend.event' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.frontend.gallery' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.frontend.social' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.message' ? 'sub-group-active' : '' }}
                ">
                        <li class="nav-item {{ $route == 'admin.frontend.general_settings' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.frontend.general_settings') }}"
                                class="nav-link {{ $route == 'admin.frontend.general_settings' ? 'menu-active' : '' }} "><i
                                    class="fas fa-angle-right"></i>General Settings</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.frontend.banner' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.frontend.banner') }}"
                                class="nav-link {{ $route == 'admin.frontend.banner' ? 'menu-active' : '' }}"><i
                                    class="fas fa-angle-right"></i>Banner</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.frontend.message' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.frontend.message') }}"
                                class="nav-link {{ $route == 'admin.frontend.message' ? 'menu-active' : '' }}"><i
                                    class="fas fa-angle-right"></i>Message Settings</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.frontend.notice' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.frontend.notice') }}"
                                class="nav-link {{ $route == 'admin.frontend.notice' ? 'menu-active' : '' }}"><i
                                    class="fas fa-angle-right"></i>Notice</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.frontend.school' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.frontend.school') }}"
                                class="nav-link {{ $route == 'admin.frontend.school' ? 'menu-active' : '' }}"><i
                                    class="fas fa-angle-right"></i>School Section</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.frontend.event' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.frontend.event') }}"
                                class="nav-link {{ $route == 'admin.frontend.event' ? 'menu-active' : '' }}"><i
                                    class="fas fa-angle-right"></i>Event Settings</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.frontend.gallery' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.frontend.gallery') }}"
                                class="nav-link {{ $route == 'admin.frontend.gallery' ? 'menu-active' : '' }}"><i
                                    class="fas fa-angle-right"></i>Gallery Settings</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.frontend.social' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.frontend.social') }}"
                                class="nav-link {{ $route == 'admin.frontend.social' ? 'menu-active' : '' }}"><i
                                    class="fas fa-angle-right"></i>Social Settings</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.message' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.message') }}"
                                class="nav-link {{ $route == 'admin.message' ? 'menu-active' : '' }}"><i
                                    class="fas fa-angle-right"></i><span>Message</span></a>
                        </li>

                    </ul>
                </li>
                @endif


                    <li class="nav-item sidebar-nav-item
                        {{ $route == 'admin.staff.index' ? 'menu-active' : '' }}
                        {{ $route == 'admin.accountant.index' ? 'menu-active' : '' }}
                        {{ $route == 'teacher.index' ? 'menu-active' : '' }}
                        {{ $route == 'teacher.add' ? 'menu-active' : '' }}
                        {{ $route == 'admin.librarian.index' ? 'menu-active' : '' }}

                    ">

                    <a href="#" class="nav-link
                        {{ $route == 'admin.staff.index' ? 'menu-active' : '' }}
                        {{ $route == 'admin.accountant.index' ? 'menu-active' : '' }}
                        {{ $route == 'teacher.index' ? 'menu-active' : '' }}
                        {{ $route == 'teacher.add' ? 'menu-active' : '' }}
                        {{ $route == 'admin.librarian.index' ? 'menu-active' : '' }}
                    ">
                    <i class="fa fa-users" aria-hidden="true"></i><span>Users</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                        {{ $route == 'admin.staff.index' ? 'sub-group-active' : '' }}
                        {{ $route == 'admin.accountant.index' ? 'sub-group-active' : '' }}
                        {{ $route == 'teacher.index' ? 'sub-group-active' : '' }}
                        {{ $route == 'admin.librarian.index' ? 'sub-group-active' : '' }}

                        ">
                        <li class="nav-item {{ $route == 'admin.staff.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.staff.index') }}"
                                class="nav-link {{ $route == 'admin.staff.index' ? 'menu-active' : '' }}"><i class="fa-solid fa-users"></i>
                                <span>Staff</span></a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.librarian.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.librarian.index') }}"
                                class="nav-link {{ $route == 'admin.librarian.index' ? 'menu-active' : '' }}"><i class="fa-solid fa-book"></i><span>Librarian</span></a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.accountant.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.accountant.index') }}"
                                class="nav-link {{ $route == 'admin.accountant.index' ? 'menu-active' : '' }}"><i class="fas fa-dollar-sign"></i><span>Accountant</span></a>
                        </li>
                        <li
                            class="nav-item sidebar-nav-item
                        {{ $route == 'teacher.index' ? 'menu-active' : '' }}">
                            <a href="#"
                                class="nav-link
                            {{ $route == 'teacher.index' ? 'menu-active' : '' }}

                        "><i
                                    class="fa-solid fa-user-graduate"></i><span>Teacher</span></a>
                            <ul
                                class="nav sub-group-menu menu-open
                            {{ $route == 'teacher.index' ? 'sub-group-active' : '' }}

                        ">
                                <li class="nav-item {{ $route == 'teacher.index' ? 'menu-active' : '' }}">
                                    <a href="{{ route('teacher.index') }}"
                                        class="nav-link {{ $route == 'teacher.index' ? 'menu-active' : '' }} "><i
                                            class="fas fa-angle-right"></i>Teacher</a>
                                </li>
                                <li class="nav-item {{ $route == 'teacher.add' ? 'menu-active' : '' }}">
                                    <a href="{{ route('teacher.add') }}"
                                        class="nav-link {{ $route == 'teacher.add' ? 'menu-active' : '' }} "><i
                                            class="fas fa-angle-right"></i>Add Teacher</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item sidebar-nav-item
                        {{ $route == 'admin.session' ? 'menu-active' : '' }}
                        {{ $route == 'admin.class' ? 'menu-active' : '' }}
                        {{ $route == 'admin.section' ? 'menu-active' : '' }}


                    ">

                    <a href="#" class="nav-link
                        {{ $route == 'admin.session' ? 'menu-active' : '' }}
                        {{ $route == 'admin.class' ? 'menu-active' : '' }}
                        {{ $route == 'admin.section' ? 'menu-active' : '' }}
                    ">
                    <i class="fa fa-cog" aria-hidden="true"></i><span>Accademic</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                        {{ $route == 'admin.session' ? 'sub-group-active' : '' }}
                        {{ $route == 'admin.class' ? 'sub-group-active' : '' }}
                        {{ $route == 'admin.section' ? 'sub-group-active' : '' }}

                        ">
                        <li class="nav-item {{ $route == 'admin.session' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.session') }}"
                                class="nav-link {{ $route == 'admin.session' ? 'menu-active' : '' }}"><i
                                    class="fa-solid fa-calendar-days"></i><span>Session</span></a>
                        </li>
                        <li
                            class="nav-item sidebar-nav-item
                        {{ $route == 'admin.class' ? 'menu-active' : '' }}
                        {{ $route == 'admin.section' ? 'menu-active' : '' }}">
                            <a href="#"
                                class="nav-link
                            {{ $route == 'admin.class' ? 'menu-active' : '' }}
                            {{ $route == 'admin.section' ? 'menu-active' : '' }}

                        "><i
                                    class="fa-solid fa-diagram-project"></i><span>Class</span></a>
                            <ul
                                class="nav sub-group-menu menu-open
                            {{ $route == 'admin.class' ? 'sub-group-active' : '' }}
                            {{ $route == 'admin.section' ? 'sub-group-active' : '' }}

                        ">
                                <li class="nav-item {{ $route == 'admin.class' ? 'menu-active' : '' }}">
                                    <a href="{{ route('admin.class') }}"
                                        class="nav-link {{ $route == 'admin.class' ? 'menu-active' : '' }} ">
                                        <i class="fas fa-angle-right"></i>Manage Class</a>
                                </li>
                                <li class="nav-item {{ $route == 'admin.class' ? 'menu-active' : '' }}">
                                    <a href="{{ route('admin.section') }}"
                                        class="nav-link {{ $route == 'admin.section' ? 'menu-active' : '' }} ">
                                        <i class="fas fa-angle-right"></i>Manage Section</a>
                                </li>

                            </ul>
                        </li>



                    </ul>
                </li>

                @if(auth()->user()->hasPermission('app.subject.index'))

                <li
                    class="nav-item sidebar-nav-item
                @foreach ($classes as $class)
                    {{ $url == asset('/') . ('admin/subject/' . $class->id) ? 'menu-active' : '' }} @endforeach

            ">
                    <a href="#"
                        class="nav-link
                    @foreach ($classes as $class)
                        {{ $url == asset('/') . ('admin/subject/' . $class->id) ? 'menu-active' : '' }} @endforeach
                "><i class="fas fa-tasks"></i><span>Subject</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                    @foreach ($classes as $class)
                        {{ $url == asset('/') . ('admin/subject/' . $class->id) ? 'sub-group-active' : '' }} @endforeach
                ">
                        @foreach ($classes as $class)
                            <li
                                class="nav-item {{ $url == asset('/') . ('admin/subject/' . $class->id) ? 'menu-active' : '' }}">
                                <a href="{{ route('admin.subject', ['id' => $class->id]) }}"
                                    class="nav-link {{ $url == asset('/') . ('admin/subject/' . $class->id) ? 'menu-active' : '' }}">
                                    <i class="fas fa-angle-right"></i>
                                    {{ $class->class_name }}

                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @endif

                {{-- @if(auth()->user()->hasPermission('app.classroutine.index'))
                <li class="nav-item {{ $route == 'admin.staff.index' ? 'menu-active' : '' }}">
                    <a href="{{ route('admin.staff.index') }}"
                        class="nav-link {{ $route == 'admin.staff.index' ? 'menu-active' : '' }}"><i class="fa-solid fa-users"></i>
                        <span>Staff</span></a>
                </li>
                @endif --}}

                {{-- @if(auth()->user()->hasPermission('app.accountant.index'))

                <li class="nav-item {{ $route == 'admin.accountant.index' ? 'menu-active' : '' }}">
                    <a href="{{ route('admin.accountant.index') }}"
                        class="nav-link {{ $route == 'admin.accountant.index' ? 'menu-active' : '' }}"><i class="fas fa-dollar-sign"></i><span>Accountant</span></a>
                </li>

                @endif --}}

                {{-- @if(auth()->user()->hasPermission('app.librarian.index'))
                <li class="nav-item {{ $route == 'admin.librarian.index' ? 'menu-active' : '' }}">
                    <a href="{{ route('admin.librarian.index') }}"
                        class="nav-link {{ $route == 'admin.librarian.index' ? 'menu-active' : '' }}"><i class="fa-solid fa-book"></i><span>Librarian</span></a>
                </li>
                @endif --}}
{{--
                @if(auth()->user()->hasPermission('app.teacher.index'))
                <li
                    class="nav-item sidebar-nav-item
                {{ $route == 'teacher.index' ? 'menu-active' : '' }}">
                    <a href="#"
                        class="nav-link
                    {{ $route == 'teacher.index' ? 'menu-active' : '' }}

                "><i
                            class="fa-solid fa-user-graduate"></i><span>Teacher</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                    {{ $route == 'teacher.index' ? 'sub-group-active' : '' }}

                ">
                        <li class="nav-item {{ $route == 'teacher.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('teacher.index') }}"
                                class="nav-link {{ $route == 'teacher.index' ? 'menu-active' : '' }} "><i
                                    class="fas fa-angle-right"></i>Teacher</a>
                        </li>
                        <li class="nav-item {{ $route == 'teacher.add' ? 'menu-active' : '' }}">
                            <a href="{{ route('teacher.add') }}"
                                class="nav-link {{ $route == 'teacher.add' ? 'menu-active' : '' }} "><i
                                    class="fas fa-angle-right"></i>Add Teacher</a>
                        </li>

                    </ul>
                </li>

                @endif --}}

                {{-- @if(auth()->user()->hasPermission('app.session.index'))
                <li class="nav-item {{ $route == 'admin.session' ? 'menu-active' : '' }}">
                    <a href="{{ route('admin.session') }}"
                        class="nav-link {{ $route == 'admin.session' ? 'menu-active' : '' }}"><i
                            class="fa-solid fa-calendar-days"></i><span>Session</span></a>
                </li>
                @endif --}}
                {{-- <li class="nav-item {{ $route == 'course.index' ? 'menu-active' : '' }}">
                <a href="{{ route('course.index') }}"
                    class="nav-link {{ $route == 'course.index' ? 'menu-active' : '' }}"><i
                        class="fab fa-discourse"></i><span>Course</span></a>
            </li>
            <li class="nav-item {{ $route == 'trade.index' ? 'menu-active' : '' }}">
                <a href="{{ route('trade.index') }}"
                    class="nav-link {{ $route == 'trade.index' ? 'menu-active' : '' }}"><i
                        class="fab fa-trade-federation"></i><span>Trade</span></a>
            </li> --}}

                {{--            <li class="nav-item {{($route == 'teacher.index')?'menu-active': ''}}"> --}}
                {{--                <a href="{{ route('teacher.index') }}" class="nav-link {{($route == 'teacher.index')?'menu-active': ''}}"><i class="fas fa-chalkboard-teacher"></i><span>Teacher</span></a> --}}
                {{--            </li> --}}

                @if(auth()->user()->hasPermission('app.application.index'))
                <li class="nav-item {{ $route == 'admin.application.canidate' ? 'menu-active' : '' }}">
                    <a href="{{ route('admin.application.canidate') }}"
                        class="nav-link {{ $route == 'admin.application.canidate' ? 'menu-active' : '' }}"><i
                            class="fas fa-user"></i><span>Application Canidate</span></a>
                </li>
                @endif

                @if(auth()->user()->hasPermission('app.class.index'))
                {{-- <li
                    class="nav-item sidebar-nav-item
                {{ $route == 'admin.class' ? 'menu-active' : '' }}
                {{ $route == 'admin.section' ? 'menu-active' : '' }}">
                    <a href="#"
                        class="nav-link
                    {{ $route == 'admin.class' ? 'menu-active' : '' }}
                    {{ $route == 'admin.section' ? 'menu-active' : '' }}

                "><i
                            class="fa-solid fa-diagram-project"></i><span>Class</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                    {{ $route == 'admin.class' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.section' ? 'sub-group-active' : '' }}

                ">
                        <li class="nav-item {{ $route == 'admin.class' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.class') }}"
                                class="nav-link {{ $route == 'admin.class' ? 'menu-active' : '' }} ">
                                <i class="fas fa-angle-right"></i>Manage Class</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.class' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.section') }}"
                                class="nav-link {{ $route == 'admin.section' ? 'menu-active' : '' }} ">
                                <i class="fas fa-angle-right"></i>Manage Section</a>
                        </li>

                    </ul>
                </li> --}}
                @endif
                @if (auth()->user()->hasPermission('app.student.index'))
                    <li
                        class="nav-item sidebar-nav-item
                {{ $route == 'admin.student' ? 'menu-active' : '' }}
                {{ $route == 'admin.student.add' ? 'menu-active' : '' }}">
                        <a href="#"
                            class="nav-link
                    {{ $route == 'admin.student' ? 'menu-active' : '' }}
                    {{ $route == 'admin.student.add' ? 'menu-active' : '' }}

                "><i
                                class="fa-solid fa-graduation-cap"></i><span>Student</span></a>
                        <ul
                            class="nav sub-group-menu menu-open
                    {{ $route == 'admin.student' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.student.add' ? 'sub-group-active' : '' }}

                ">
                            @if (auth()->user()->hasPermission('app.student.create'))


                                <li class="nav-item {{ $route == 'admin.student.add' ? 'menu-active' : '' }}">
                                    <a href="{{ route('admin.student.add') }}"
                                        class="nav-link {{ $route == 'admin.student.add' ? 'menu-active' : '' }} ">
                                        <i class="fas fa-angle-right"></i>Add Student</a>
                                </li>
                            @endif
                            <li class="nav-item {{ $route == 'admin.student' ? 'menu-active' : '' }}">
                                <a href="{{ route('admin.student') }}"
                                    class="nav-link {{ $route == 'admin.student' ? 'menu-active' : '' }}">
                                    <i class="fas fa-angle-right"></i>All Student</a>
                            </li>

                        </ul>
                    </li>
                @endif

                @if(auth()->user()->hasPermission('app.attendance.index'))
                <li
                    class="nav-item sidebar-nav-item
                {{ $route == 'admin.dailyAttendance.index' ? 'menu-active' : '' }}">
                    <a href="#"
                        class="nav-link
                {{ $route == 'admin.dailyAttendance.index' ? 'menu-active' : '' }}

            "><i class="fa-solid fa-clipboard-user"></i><span>Attendance</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                    {{ $route == 'admin.dailyAttendance.index' ? 'sub-group-active' : '' }}


                ">
                        <li class="nav-item {{ $route == 'admin.dailyAttendance.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.dailyAttendance.index') }}"
                                class="nav-link {{ $route == 'admin.dailyAttendance.index' ? 'menu-active' : '' }} ">
                                <i class="fas fa-angle-right"></i>Daily Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link">
                                <i class="fas fa-angle-right"></i>Attendance Report</a>
                        </li>
                    </ul>
                </li>

                @endif


                @if(auth()->user()->hasPermission('app.classroutine.index'))
                <li class="nav-item {{ $route == 'admin.classRoutine' ? 'menu-active' : '' }}">
                    <a href="{{ route('admin.classRoutine') }}"
                        class="nav-link {{ $route == 'admin.classRoutine' ? 'menu-active' : '' }}"><i
                            class="fas fa-tasks"></i><span>Class Routine</span></a>
                </li>
                @endif

                @if(auth()->user()->hasPermission('app.exam.index'))

                <li
                    class="nav-item sidebar-nav-item
                {{ $route == 'admin.examList.index' ? 'menu-active' : '' }}
                {{ $route == 'admin.examGrade.index' ? 'menu-active' : '' }}
                {{ $route == 'admin.manageMark.index' ? 'menu-active' : '' }}

            ">

                    <a href="#"
                        class="nav-link
                {{ $route == 'admin.examList.index' ? 'menu-active' : '' }}
                {{ $route == 'admin.examGrade.index' ? 'menu-active' : '' }}
                {{ $route == 'admin.manageMark.index' ? 'menu-active' : '' }}
                {{ $route == 'admin.manageMark.result' ? 'menu-active' : '' }}

            "><i class="fa-solid fa-stream"></i><span>Exam</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                {{ $route == 'admin.examList.index' ? 'sub-group-active' : '' }}
                {{ $route == 'admin.examGrade.index' ? 'sub-group-active' : '' }}
                {{ $route == 'admin.manageMark.index' ? 'sub-group-active' : '' }}
                {{ $route == 'admin.manageMark.result' ? 'sub-group-active' : '' }}

                ">
                        <li class="nav-item {{ $route == 'admin.examList.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.examList.index') }}"
                                class="nav-link {{ $route == 'admin.examList.index' ? 'menu-active' : '' }} ">
                                <i class="fas fa-angle-right"></i>Exam List</a>
                        </li>
                        {{-- <li class="nav-item {{ $route == 'admin.examGrade.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.examGrade.index') }}"
                                class="nav-link {{ $route == 'admin.examGrade.index' ? 'menu-active' : '' }}">
                                <i class="fas fa-angle-right"></i>Exam Grades</a>
                        </li> --}}


                        <li class="nav-item {{ $route == 'admin.manageMark.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.manageMark.index') }}"
                                class="nav-link {{ $route == 'admin.manageMark.index' ? 'menu-active' : '' }}">
                                <i class="fas fa-angle-right"></i>Manage Marks</a>
                        </li>

                        <li class="nav-item {{ $route == 'admin.manageMark.edit' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.manageMark.edit') }}"
                                class="nav-link {{ $route == 'admin.manageMark.edit' ? 'menu-active' : '' }}">
                                <i class="fas fa-angle-right"></i>Edit Marks</a>
                        </li>

                        <li class="nav-item {{ $route == 'admin.manageMark.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.manageMark.index') }}"
                                class="nav-link {{ $route == 'admin.manageMark.index' ? 'menu-active' : '' }}">
                                <i class="fas fa-angle-right"></i>Manage Marks Individual</a>
                        </li>

                        <li class="nav-item {{ $route == 'admin.manageMark.result' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.manageMark.result') }}"
                                class="nav-link {{ $route == 'admin.manageMark.result' ? 'menu-active' : '' }}">
                                <i class="fas fa-angle-right"></i>Result</a>
                        </li>


                    </ul>
                </li>
                @endif
                @if(auth()->user()->hasPermission('app.library.index'))

                <li
                    class="nav-item sidebar-nav-item
                    {{ $route == 'admin.bookCategory.index' ? 'menu-active' : '' }}
                    {{ $route == 'admin.library.index' ? 'menu-active' : '' }}
                    {{ $route == 'admin.issueBook.index' ? 'menu-active' : '' }}">

                    <a href="#"
                        class="nav-link
                        {{ $route == 'admin.bookCategory.index' ? 'menu-active' : '' }}
                        {{ $route == 'admin.library.index' ? 'menu-active' : '' }}
                        {{ $route == 'admin.issueBook.index' ? 'menu-active' : '' }}

                    "><i class="fa-solid fa-book"></i><span>Library Management</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                        {{ $route == 'admin.bookCategory.index' ? 'sub-group-active' : '' }}
                        {{ $route == 'admin.library.index' ? 'sub-group-active' : '' }}
                        {{ $route == 'admin.admin.issueBook.index' ? 'sub-group-active' : '' }}

                    ">
                        <li class="nav-item {{ $route == 'admin.bookCategory.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.bookCategory.index') }}"
                                class="nav-link {{ $route == 'admin.bookCategory.index' ? 'menu-active' : '' }} ">
                                <i class="fas fa-angle-right"></i>Book Category</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.examList.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.examList.index') }}"
                                class="nav-link {{ $route == 'admin.examList.index' ? 'menu-active' : '' }} ">
                                <i class="fas fa-angle-right"></i>Library Rack</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.library.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.library.index') }}"
                                class="nav-link {{ $route == 'admin.library.index' ? 'menu-active' : '' }}">
                                <i class="fas fa-angle-right"></i>Manage Book</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.issueBook.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.issueBook.index') }}"
                                class="nav-link {{ $route == 'admin.issueBook.index' ? 'menu-active' : '' }}">
                                <i class="fas fa-angle-right"></i>Book Issue</a>
                        </li>

                    </ul>
                </li>
                @endif
                @if(auth()->user()->hasPermission('app.setting.index'))

                <li
                    class="nav-item sidebar-nav-item
                    {{ $route == 'admin.smsEmail.index' ? 'menu-active' : '' }}
                    {{ $route == 'admin.smsEmail.index' ? 'menu-active' : '' }}
                    {{ $route == 'admin.smsEmail.index' ? 'menu-active' : '' }}">

                    <a href="#"
                        class="nav-link
                        {{ $route == 'admin.smsEmail.index' ? 'menu-active' : '' }}
                        {{ $route == 'admin.mobail.sms' ? 'menu-active' : '' }}">
                        <i class="fa-solid fa-comment-sms"></i><span>SMS</span></a>
                    <ul
                        class="nav sub-group-menu menu-open
                        {{ $route == 'admin.smsEmail.index' ? 'sub-group-active' : '' }}
                        {{ $route == 'admin.mobail.sms' ? 'sub-group-active' : '' }}">
                        <li class="nav-item {{ $route == 'admin.smsEmail.index' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.smsEmail.index') }}"
                                class="nav-link {{ $route == 'admin.smsEmail.index' ? 'menu-active' : '' }} ">
                                <i class="fas fa-angle-right"></i>Email SMS</a>
                        </li>
                        <li class="nav-item {{ $route == 'admin.mobail.sms' ? 'menu-active' : '' }}">
                            <a href="{{ route('admin.mobail.sms') }}"
                                class="nav-link {{ $route == 'admin.mobail.sms' ? 'menu-active' : '' }} ">
                                <i class="fas fa-angle-right"></i>SMS</a>
                        </li>
                    </ul>
                </li>

                @endif

                @if(auth()->user()->hasPermission('app.setting.index'))

                <li class="nav-item {{ $route == 'admin.transport.index' ? 'menu-active' : '' }}">
                    <a
                        href="{{ route('admin.transport.index') }}"
                        class="nav-link {{ $route == 'admin.transport.index' ? 'menu-active' : '' }}">
                        <i class="fa-sharp fa-solid fa-car-side"></i><span>Transport</span></a>
                </li>

                @endif

                @if(auth()->user()->hasPermission('app.setting.index'))

                <li class="nav-item sidebar-nav-item">
                    <a
                        href="#"
                        class="nav-link
                        {{ $route == 'admin.inventoryCategory.index' ? 'menu-active' : '' }}
                        {{ $route == 'admin.inventorySupplier.index' ? 'menu-active' : '' }}
                        {{ $route == 'admin.inventory.index' ? 'menu-active' : '' }}
                        {{ $route == 'admin.inventory.create' ? 'menu-active' : '' }}
                        {{ $route == 'admin.inventory.identity' ? 'menu-active' : '' }}
                        {{ $route == 'admin.inventory.allidentity' ? 'menu-active' : '' }}
                        {{ $route == 'admin.inventory.reject' ? 'menu-active' : '' }}
                        {{ $route == 'admin.stock.store' ? 'menu-active' : '' }}
                        {{ $route == 'admin.inventory.invoice' ? 'menu-active' : '' }}
                        {{ $route == 'admin.inventory.report' ? 'menu-active' : '' }}">
                        <i class="fa-solid fa-warehouse"></i>
                        <span>Inventory</span>

                    </a>
                <ul
                    class="nav sub-group-menu menu-open
                    {{ $route == 'admin.inventoryCategory.index' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.inventory.index' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.inventory.create' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.inventory.identity' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.inventory.allidentity' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.inventory.reject' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.stock.store' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.inventory.invoice' ? 'sub-group-active' : '' }}
                    {{ $route == 'admin.inventory.report' ? 'sub-group-active' : '' }}
                    ">


                    <li
                        class="nav-item
                        {{ $route == 'admin.inventoryCategory.index' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.inventoryCategory.index') }}"
                            class="nav-link {{ $route == 'admin.inventoryCategory.index' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                                Category
                        </a>
                    </li>
                    <li
                        class="nav-item
                        {{ $route == 'admin.inventorySupplier.index' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.inventorySupplier.index') }}"
                            class="nav-link {{ $route == 'admin.inventorySupplier.index' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                                Supplier
                        </a>
                    </li>

                    <li
                        class="nav-item
                        {{ $route == 'admin.inventory.index' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.inventory.index') }}"
                            class="nav-link {{ $route == 'admin.inventory.index' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                                Inventory
                        </a>
                    </li>

                    <li
                        class="nav-item
                        {{ $route == 'admin.inventory.invoice' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.inventory.invoice') }}"
                            class="nav-link {{ $route == 'admin.inventory.invoice' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                            Invoice
                        </a>
                    </li>

                    <li
                        class="nav-item
                        {{ $route == 'admin.inventory.identity' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.inventory.identity') }}"
                            class="nav-link {{ $route == 'admin.inventory.identity' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                               Add Identity
                        </a>
                    </li>

                    <li
                        class="nav-item
                        {{ $route == 'admin.inventory.allidentity' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.inventory.allidentity') }}"
                            class="nav-link {{ $route == 'admin.inventory.allidentity' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                               All Identity
                        </a>
                    </li>



                    <li
                        class="nav-item
                        {{ $route == 'admin.stock.store' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.stock.store') }}"
                            class="nav-link {{ $route == 'admin.stock.store' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                               Store Stock
                        </a>
                    </li>
                    <li
                        class="nav-item
                        {{ $route == 'admin.inventory.reject' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.inventory.reject') }}"
                            class="nav-link {{ $route == 'admin.inventory.reject' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                               Lost Product
                        </a>
                    </li>
                    <li
                        class="nav-item
                        {{ $route == 'admin.inventory.report' ? 'menu-active' : '' }}">
                        <a
                            href="{{ route('admin.inventory.report') }}"
                            class="nav-link {{ $route == 'admin.inventory.report' ? 'menu-active' : '' }} ">
                            <i class="fas fa-angle-right"></i>
                               Reports
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            @role('student')
            <li class="nav-item">
                <a
                    href="}"
                    class="nav-link ">
                    <i class="fa-sharp fa-solid fa-car-side"></i><span>Setting</span></a>
            </li>
            @endrole

            @role('admin')

            <li class="nav-item sidebar-nav-item
                    {{ $route == 'admin.accounting.index' ? 'menu-active' : '' }}
                    {{ $route == 'admin.accounting.expanse' ? 'menu-active' : '' }}
                    {{ $route == 'admin.accounting.manageAccounting' ? 'menu-active' : '' }}
                    {{ $route == 'admin.empsalary.index' ? 'menu-active' : '' }}
                    {{ $route == 'admin.accounting.allExpance' ? 'menu-active' : '' }}

                    ">

                <a href="#" class="nav-link
                    {{ $route == 'admin.accounting.index' ? 'menu-active' : '' }}
                    {{ $route == 'admin.accounting.allExpance' ? 'menu-active' : '' }}
                    {{ $route == 'admin.empsalary.index' ? 'menu-active' : '' }}
                    {{ $route == 'admin.accounting.manageAccounting' ? 'menu-active' : '' }}
                    {{ $route == 'admin.accounting.expanse' ? 'menu-active' : '' }}">
                  <i class="far fa-money-bill-alt" aria-hidden="true"></i><span>Accounting</span></a>
                <ul class="nav sub-group-menu menu-open
                {{ $route == 'admin.accounting.index' ? 'sub-group-active' : '' }}
                {{ $route == 'admin.accounting.allExpance' ? 'sub-group-active' : '' }}
                {{ $route == 'admin.empsalary.index' ? 'sub-group-active' : '' }}
                {{ $route == 'admin.accounting.manageAccounting' ? 'sub-group-active' : '' }}
                {{ $route == 'admin.accounting.expanse' ? 'sub-group-active' : '' }}">

                    <li class="nav-item {{ $route == 'admin.accounting.index' ? 'menu-active' : '' }}">
                        <a href="{{ route('admin.accounting.index') }}"
                            class="nav-link {{ $route == 'admin.accounting.index' ? 'menu-active' : '' }}">
                            <i class="fas fa-angle-right"></i>Add Student Fee</a>
                    </li>
                    <li class="nav-item {{ $route == 'admin.accounting.expanse' ? 'menu-active' : '' }}">
                        <a href="{{ route('admin.accounting.expanse') }}"
                            class="nav-link {{ $route == 'admin.accounting.expanse' ? 'menu-active' : '' }}">
                            <i class="fas fa-angle-right"></i>Expanse</a>
                    </li>

                    <li class="nav-item {{ $route == 'admin.accounting.allExpance' ? 'menu-active' : '' }}">
                        <a href="{{ route('admin.accounting.allExpance') }}"
                            class="nav-link {{ $route == 'admin.accounting.allExpance' ? 'menu-active' : '' }}">
                            <i class="fas fa-angle-right"></i>All Expanse</a>
                    </li>

                    <li class="nav-item {{ $route == 'admin.empsalary.index' ? 'menu-active' : '' }}">
                        <a href="{{ route('admin.empsalary.index') }}"
                            class="nav-link {{ $route == 'admin.empsalary.index' ? 'menu-active' : '' }}">
                            <i class="fas fa-angle-right"></i>Employee Salery Manage</a>
                    </li>
                    <li class="nav-item {{ $route == 'admin.accounting.manageAccounting' ? 'menu-active' : '' }}">
                        <a href="{{ route('admin.accounting.manageAccounting') }}"
                            class="nav-link {{ $route == 'admin.accounting.manageAccounting' ? 'menu-active' : '' }}">
                            <i class="fas fa-angle-right"></i>Manage Account</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item sidebar-nav-item
                    {{-- {{ $route == 'admin.smsEmail.index' ? 'menu-active' : '' }} --}}

                   ">

                <a href="#" class="nav-link
                    {{-- {{ $route == 'admin.smsEmail.index' ? 'menu-active' : '' }} --}}
                  ">
                  <i class="fa fa-cog" aria-hidden="true"></i><span>Settings</span></a>
                <ul
                    class="nav sub-group-menu menu-open
                    {{-- {{ $route == 'admin.smsEmail.index' ? 'sub-group-active' : '' }} --}}
                    ">
                    <li class="nav-item">
                        <a href=""
                            class="nav-link ">
                            <i class="fas fa-angle-right"></i>Email Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href=""
                            class="nav-link">
                            <i class="fas fa-angle-right"></i>SMS Settings</a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>
    </div>
</div>
