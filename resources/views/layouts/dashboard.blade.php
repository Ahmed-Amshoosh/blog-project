<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dropzone.css')}}">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>

        .visit_website{
            color: #9e9e9e;
            display: flex;
            font-size: 12px;
            opacity: 1;
            padding: 5px 15px;
            white-space: nowrap;
        }
        .visit_website a{
            font-size: 14px!important;
        }
        .visit_website:hover{
            color: #0a58ca;
        }

        .visit_website:hover.visit_website a i{
            margin-left: 7px;
            transition: 0.5s ease-out;
            color: #0a58ca;
        }
        .sidebar-menu li.menu-title a {
             color: #6f6f6f;
            display: inline-block;
            margin-left: 0px;
             margin-right: auto;
            padding: 0;
        }
    </style>

</head>

<body>

<div class="main-wrapper">

    <div class="header">

        <div class="header-left">
            <a href="#" class="logo">
                <img src="/images/{{\App\Models\Setting::all()->first()->logo ??''}}" alt="Logo">
            </a>
            <a href="#" class="logo logo-small">
                <img src="/images/{{\App\Models\Setting::all()->first()->favicon ??''}}" alt="Logo" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

{{--        <div class="top-nav-search">--}}
{{--            <form>--}}
{{--                <label>--}}
{{--                    <input type="text" class="form-control" placeholder="Search here">--}}
{{--                </label>--}}
{{--                <button class="btn" type="submit"><i class="fas fa-search"></i></button>--}}
{{--            </form>--}}
{{--        </div>--}}
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
{{--            <li class="nav-item dropdown noti-dropdown language-drop me-2">--}}
{{--                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">--}}
{{--                    <img src="{{asset('img/icons/header-icon-01.svg')}}" alt="">--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu ">--}}
{{--                    <div class="noti-content">--}}
{{--                        <div>--}}
{{--                            <a class="dropdown-item" href="#"><i--}}
{{--                                    class="flag flag-lr me-2"></i>English</a>--}}
{{--                            <a class="dropdown-item" href="#"><i--}}
{{--                                    class="flag flag-bl me-2"></i>Francais</a>--}}
{{--                            <a class="dropdown-item" href="#"><i class="flag flag-cn me-2"></i>Turkce</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}




            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
{{--                            <img class="rounded-circle" src="{{asset('img/profiles/avatar-01.jpg')}}" width="31"--}}
{{--                                 alt="Soeng Souy">--}}
                            <i class="fa fa-user rounded-circle"></i>
                            <div class="user-text">
                                <h6>{{auth()->user()->name}}</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="/images/{{\App\Models\AdminInfo::all()->first()->image ??''}}" alt="User Image"
                                 class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{auth()->user()->name}}</h6>
                            <p class="text-muted mb-0">Administrator</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </div>
            </li>

        </ul>

    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="">
                        <a href="{{route('home')}}" target="_blank"><i class="feather-globe"></i> <span>Visit Website</span></a>
                    </li>
                    <li class="{{ request()->is('admin/home*') ? 'active' : '' }}">
                        <a href="{{route('admin/home')}}"><i class="feather-grid"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="{{ request()->is('admin/info*') ? 'active' : '' }}">
                        <a href="{{route('admin.info')}}"><i class="fas fa-user-cog"></i> <span>Admin</span></a>
                    </li>
                    <li class="{{ request()->is('users/info*') ? 'active' : '' }}">
                        <a href="{{route('user.info')}}"><i class="fas feather-user"></i> <span>User</span></a>
                    </li>

{{--                    <li class="submenu ">--}}
{{--                        <a href="#"><i class="fas fa-table"></i> <span> Appointments</span> <span--}}
{{--                                class="menu-arrow"></span></a>--}}
{{--                        <ul>--}}
{{--                            <li ><a class="" href="{{route('admin.appointments')}}">Appointments</a></li>--}}
{{--                            <li><a href="{{route('admin.add_appointment')}}">Add Appointment</a></li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="submenu">--}}
{{--                        <a href="#"><i class="fa fa-user"></i> <span> Doctors</span> <span--}}
{{--                                class="menu-arrow"></span></a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="{{route('admin.doctors')}}">Doctors</a></li>--}}
{{--                            <li><a href="{{route('admin.add_doctor')}}">Add Doctor</a></li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="submenu">--}}
{{--                        <a href="#"><i class="fa fa-users"></i> <span> Departments</span> <span--}}
{{--                                class="menu-arrow"></span></a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="{{route('admin.departments')}}">Departments</a></li>--}}
{{--                            <li><a href="{{route('admin.add_department')}}">Add Department</a></li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="{{ request()->is('admin/contact*') ? 'active' : '' }}">
                        <a href="{{route('admin.contact')}}"><i class="fas feather-message-circle"></i> <span>Contact</span></a>
                    </li>
                    <li class="submenu {{ request()->is('admin/categories*') || request()->is('admin/add_category*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-users"></i> <span> Categories</span> <span
                                class="menu-arrow"></span></a>
                        <ul >
                            <li ><a class="{{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{route('admin.categories')}}">Categories</a></li>
                            <li ><a class="{{ request()->is('admin/add_category*') ? 'active' : '' }}" href="{{route('admin.add_category')}}">Add Category</a></li>

                        </ul>
                    </li>

{{--                    <li class="submenu">--}}
{{--                        <a href="#"><i class="fa fa-users"></i> <span> Notices</span> <span--}}
{{--                                class="menu-arrow"></span></a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="{{route('admin.notices')}}">Notices</a></li>--}}
{{--                            <li><a href="{{route('admin.add_notice')}}">Add Notice</a></li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

                    <li class="submenu {{ request()->is('admin/posts*') || request()->is('admin/add_post*') ? 'active' : '' }}
">
                        <a class="" href="#"><i class="fa fa-newspaper"></i> <span> Posts</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a class="{{ request()->is('admin/posts*') ? 'active' : '' }}" href="{{route('admin.posts')}}">Posts</a></li>
                            <li><a class="{{ request()->is('admin/add_post*') ? 'active' : '' }}" href="{{route('admin.add_post')}}">Add Post</a></li>

                        </ul>
                    </li>
                    <li class="{{ request()->is('admin/setting*') ? 'active' : '' }}">
                        <a href="{{route('setting')}}"><i class="fas feather-settings"></i> <span>Setting</span></a>
                    </li>

                    <li class="{{ request()->is('admin/logout*') ? 'active' : '' }}">
                        <a href="{{route('logout')}}"><i class="fas feather-log-out"></i> <span>Logout</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>




    <div class="page-wrapper">
        @yield('content')
        <footer>
            <p>Copyright © 2024 {{\App\Models\Setting::all()->first()->website_name ??''}}.</p>
        </footer>
    </div>
</div>

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
{{--<script src="{{asset('plugins/apexchart/apexcharts.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/apexchart/chart-data.js')}}"></script>--}}
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor5.js"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('summernote-bs4.min.js')}}"></script>
<script src="{{asset('dropzone.js')}}"></script>
<script src="{{asset('demo.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@yield('scripts')
</body>

</html>
