@extends('admin.layouts.dash-layout')

@section('content')
 <!-- App container starts -->
 <div class="app-container">

<!-- App hero header starts -->
<div class="app-hero-header d-flex align-items-center">

  <!-- Breadcrumb starts -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
      <a href="index.html">Home</a>
    </li>
    <li class="breadcrumb-item text-primary" aria-current="page">
      Dashboard
    </li>
  </ol>
  <!-- Breadcrumb ends -->

</div>
<!-- App Hero header ends -->

<!-- App body starts -->
<div class="app-body">



  <!-- Row starts -->
  <div class="row gx-3">
  <!-- Appointments -->
  <div class="col-xl-3 col-sm-6 col-12">
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="p-2 border border-success rounded-circle me-3">
            <div class="icon-box md bg-success-subtle rounded-5">
              <i class="ri-calendar-check-line fs-4 text-success"></i>
            </div>
          </div>
          <div class="d-flex flex-column">
            <h2 class="lh-1"></h2>
            <p class="m-0">Profile </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Providers -->
  <!-- <div class="col-xl-3 col-sm-6 col-12">
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="p-2 border border-primary rounded-circle me-3">
            <div class="icon-box md bg-primary-subtle rounded-5">
              <i class="ri-user-heart-line fs-4 text-primary"></i>
            </div>
          </div>
          <div class="d-flex flex-column">
            <h2 class="lh-1"></h2>
            <p class="m-0">Providers</p>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Specialities -->
  <!-- <div class="col-xl-3 col-sm-6 col-12">
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="p-2 border border-danger rounded-circle me-3">
            <div class="icon-box md bg-danger-subtle rounded-5">
              <i class="ri-stethoscope-line fs-4 text-danger"></i>
            </div>
          </div>
          <div class="d-flex flex-column">
            <h2 class="lh-1"></h2>
            <p class="m-0">Specialities</p>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Earnings or other static -->
  <div class="col-xl-3 col-sm-6 col-12">
    <!-- Keep this as needed -->
  </div>
</div>
  <!-- Row ends -->




</div>
<!-- App body ends -->
@endsection


