<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Tracker</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- AdminLTE & Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/bs-stepper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/datatable/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/datatable/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/datatable/css/buttons.bootstrap4.min.css') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link"><i class="far fa-envelope"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link"><i class="fas fa-phone-alt"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- User Dropdown -->
            <li class="nav-item dropdown name">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs user-image"> Admin</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-footer">
                        <div>
                            <a href="#" class="">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown user user-menu">
                <img src="{{ asset('admin_assets/images/user2-160x160.jpg') }}" 
                     class="user-image" 
                     alt="User Image">
            </li>
        </ul>
    </nav>
