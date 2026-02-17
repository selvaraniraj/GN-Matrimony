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
        Liked Profiles List
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
            <h5 class="card-title">Liked Profiles List</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="basicExample" class="table truncate m-0 align-middle">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Liked By (Name / Profile Id)</th>
                    <th>Liked Profile (Name / Profile Id)</th>
                    <th>Date</th>
                    <th>Interest Status</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @forelse($likes as $like)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                          <a href="{{ route('admin.requests.profile_details', $like->member->id) }}">
                        <strong>{{ $like->member->name ?? '-' }}</strong><br>
                        <small>{{ $like->member->profile_id ?? '-' }}</small>
</a>
                      </td>
                      <td>
                         <a href="{{ route('admin.requests.profile_details', $like->likedMember->id) }}">
                        <strong>{{ $like->likedMember->name ?? '-' }}</strong><br>
                        <small>{{ $like->likedMember->profile_id ?? '-' }}</small>
</a>
                      </td>
                      <td>{{ $like->created_at ? $like->created_at->format('d-m-Y') : '-' }}</td>
                      <td>
                        @if($like->flag == 2)
                          <span class="badge bg-success">Accepted</span>
                        @elseif($like->flag == 3)
                          <span class="badge bg-danger">Rejected</span>
                        @else
                          <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                      </td>
                     
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center text-danger">No liked profiles found</td>
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
