<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GN matrimony</title>

  <!-- Meta -->
  <meta name="description" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="Website">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">

  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin_assets/css/remixicon.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_assets/css/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_assets/css/OverlayScrollbars.min.css') }}">

 <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/dataTables.bs5.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/dataTables.bs5-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/buttons/dataTables.bs5-custom.css') }}">


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('admin_assets/js/admin-scripts.js') }}"></script>
</head>
<body>

<!-- Loading starts -->
<!-- <div id="loading-wrapper">
  <div class='spin-wrapper'>
    @for ($i = 0; $i < 6; $i++)
      <div class='spin'>
        <div class='inner'></div>
      </div>
    @endfor
  </div>
</div> -->
<!-- Loading ends -->

<!-- Page wrapper starts -->
<div class="page-wrapper">


<!-- App header starts -->
<div class="app-header d-flex align-items-center">

  <!-- Toggle buttons starts -->
  <div class="d-flex">
    <button class="toggle-sidebar">
      <i class="ri-menu-line"></i>
    </button>
    <button class="pin-sidebar">
      <i class="ri-menu-line"></i>
    </button>
  </div>
  <!-- Toggle buttons ends -->

  <!-- App brand starts -->
  <div class="app-brand ms-3">
    <a href="#" class="d-lg-block d-none">
      <img src="{{ asset('admin_assets/images/logo2.svg') }}" class="logo" alt="Medpass Logo">
    </a>
    <a href="#" class="d-lg-none d-md-block">
      <img src="{{ asset('admin_assets/images/logo2.svg') }}" class="logo" alt="Medpass Logo">
    </a>
  </div>
  <!-- App brand ends -->

  <!-- App header actions starts -->
  <div class="header-actions">
  
          </div>
          <!-- Header actions ends -->

    <!-- User Settings -->
   <!-- User Settings -->
<div class="dropdown ms-2">
  <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
    <div class="avatar-box">
   
      <span class="status busy"></span>
    </div>
  </a>
  <div class="dropdown-menu dropdown-menu-end shadow-lg">
    <div class="px-3 py-2">
     
    </div>
    <div class="mx-3 my-2 d-grid">
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    </div>
  </div>
</div>


  </div>
  <!-- App header actions ends -->

<!-- App header ends -->

