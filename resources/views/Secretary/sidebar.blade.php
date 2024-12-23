@extends('master_layout')
@section('master_layout')

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <h5 class="nav-link">Secretary</h5>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-power-off"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <div class="dropdown-divider"></div>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-block">
                        Logout
                    </button>
                </form>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">OBMSDT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #3A6C7C;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->complete_name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('/secretary-dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/secretary-officials') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Officials
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/secretary-users') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/secretary-transactions') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Transactions
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/secretary-org-charts') }}" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Organizational Chart
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ url('/secretary-announcements') }}" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Announcements
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/secretary-kap-calendar') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                         Calendar
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

    @yield('sidebar')

</div>
    @endsection
