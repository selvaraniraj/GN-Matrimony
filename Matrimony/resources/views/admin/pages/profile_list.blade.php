@extends('admin.layouts.dash-layout')

@section('content')
<!-- App container starts -->
<div class="app-container">

  <!-- App hero header starts -->
  <div class="app-hero-header d-flex align-items-center">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item text-primary" aria-current="page">
        Matrimony Profile List
      </li>
    </ol>
  </div>
  <!-- App Hero header ends -->

   <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Matrimony Profile List</h5>
                    <a href="add-doctors.html" class="btn btn-primary ms-auto">Add Matrimony Profile</a>
                  </div>
                  <div class="card-body">

                    <!-- Table starts -->
                    <div class="table-responsive">
                      <table id="basicExample" class="table truncate m-0 align-middle">
                       <thead>
<tr>
    <th>ID</th>
    <th>Name / Profile Id</th>
    <th>Mobile</th>
    <th>Username</th>
    <th>password</th>
 
    <th>Status</th>
    <th>Actions</th>
</tr>
</thead>

                       <tbody>
@forelse($profiles as $profile)
<tr>
    <td>{{ $profile->id }}</td>

    <td>
        <strong>{{ $profile->name ?? '-' }}</strong><br>
          <small>{{ ucfirst($profile->profile_id ?? '-') }}</small><br>
        <small>{{ ucfirst($profile->gender) }}</small>
    </td>


    <td>{{ $profile->mobile ?? '-' }}</td>

    <td>{{ $profile->email ?? '-' }}</td>

      <td>
  {{ $profile->user_name . '_' . $profile->user_id . '@123' ?? '-' }}
</td>


  <!-- <td>
  @if($profile->password)
    <span class="badge bg-info">Set</span>
  @else
    <span class="badge bg-warning">Not Set</span>
  @endif
</td> -->

    <td>
        @if($profile->is_active == 1)
            <span class="badge bg-success">Active</span>
        @else
            <span class="badge bg-danger">Inactive</span>
        @endif
    </td>

    <td>
        <div class="d-inline-flex gap-1">

            <!-- View -->
               
            <a href="{{ route('admin.requests.profile_details', $profile->id) }}"
               class="btn btn-outline-info btn-sm"
               title="View Profile">
                <i class="ri-eye-line"></i>
            </a>

            <!-- Edit -->
            <!-- <a href="{{ route('admin.matrimony.edit', $profile->id) }}"
               class="btn btn-outline-success btn-sm"
               title="Edit Profile">
                <i class="ri-edit-box-line"></i>
            </a> -->

            <!-- Delete -->
            <form action="{{ route('admin.matrimony.delete', $profile->id) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm">
                    <i class="ri-delete-bin-line"></i>
                </button>
            </form>

        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="10" class="text-center text-danger">
        No profiles found
    </td>
</tr>
@endforelse
</tbody>

                      </table>
                    </div>
                    <!-- Table ends -->

                    <!-- Modal Delete Row -->
                    <div class="modal fade" id="delRow" tabindex="-1" aria-labelledby="delRowLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="delRowLabel">
                              Confirm
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete the doctor from list?
                          </div>
                          <div class="modal-footer">
                            <div class="d-flex justify-content-end gap-2">
                              <button class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">No</button>
                              <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

          </div>
          <!-- App body ends -->
<!-- App container ends -->
@endsection
