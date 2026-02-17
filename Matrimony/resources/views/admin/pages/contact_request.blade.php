@extends('admin.layouts.dash-layout')

@section('content')
<!-- App container starts -->
<div class="app-container">

  <!-- App hero header starts -->
  <div class="app-hero-header d-flex align-items-center">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
        <a href="{{ route('admin.dashboard') }}">Home</a>
      </li>
      <li class="breadcrumb-item text-primary" aria-current="page">
        Contact Request List
      </li>
    </ol>
  </div>
  <!-- App Hero header ends -->

  <!-- App body starts -->
  <div class="app-body">
    <div class="row gx-3">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">Contact Request List</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="basicExample" class="table truncate m-0 align-middle">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Requester (Name / Profile Id)</th>
                    <th>Requested Profile (Name / Profile Id)</th>
                    <th>Date</th>
                    <th>Status</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @forelse($requests as $request)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                          <a href="{{ route('admin.requests.profile_details', $request->member->id) }}">
                        <strong>{{ $request->member->name ?? '-' }}</strong><br>
                        <small>{{ $request->member->profile_id ?? '-' }}</small>
</a>
                      </td>
                      <td>
                            <a href="{{ route('admin.requests.profile_details', $request->profile->id) }}">
                        <strong>{{ $request->profile->name ?? '-' }}</strong><br>
                        <small>{{ $request->profile->profile_id ?? '-' }}</small>
                      </td>
</a>

                      <td>{{ $request->created_at ? $request->created_at->format('d-m-Y') : '-' }}</td>
                      <td>
                        @if($request->status == 2)
                          <span class="badge bg-success">Accepted</span>
                        @elseif($request->status == 3)
                          <span class="badge bg-danger">Rejected</span>
                        @else
                          <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                      </td>
                     
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center text-danger">No contact requests found</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- App body ends -->

</div>
<!-- App container ends -->
@endsection
