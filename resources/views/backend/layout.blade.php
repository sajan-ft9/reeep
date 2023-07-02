<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GIZ</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    @vite('resources/js/app.js')

    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link">Visit Website</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        More
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('backend.profile') }}">Profile</a>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </div>
                </div>
                <li class="nav-item">

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset(auth()->user()->image_path) }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2 mb-5">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ route('backend.admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('backend.menu.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>
                                    Menu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.banner.index') }}" class="nav-link">
                                <i class="nav-icon fab fa-atlassian"></i>
                                <p>
                                    Banner
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.about.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-info"></i>
                                <p>
                                    About
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.news.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    News
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.working.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Working
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.partner.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    Partner
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.album.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Album
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.gallery.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.knowledge.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Knowledge
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.location.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-map"></i>
                                <p>
                                    Location
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.contact.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Contact
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.footer.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Footer
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.social.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Social
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="col-4" style="position:fixed;bottom:10px; right:20px; z-index:999">
                <x-alert />
            </div>
            @yield('content')
        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
    {{-- CKNeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    @yield('scripts')
    @yield('js')
</body>

</html>
