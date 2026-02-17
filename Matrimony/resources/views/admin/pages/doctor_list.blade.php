@extends('layouts.dash-layout')

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
       Doctor list
      </li>
    </ol>
  </div>
  <!-- App Hero header ends -->

  <!-- App body starts -->
  <div class="app-body">
    <div class="row gx-3">
      <div class="col-sm-12">
        <div class="card">



        
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table truncate m-0 align-middle">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Doctor Name</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Speciality Name</th>
                
                    <!-- <th>Experience</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
               @php $i = 1; @endphp
@foreach($doctor as $row)
<tr>
    <td>{{ $i++ }}</td>

    <!-- Doctor Name -->
    <td>{{ $row->doctor_name }}</td>

    <!-- Gender -->
    <td>{{ $row->gender }}</td>

    <!-- Mobile -->
    <td>{{ $row->mobile_number }}</td>

    <!-- Speciality Name (IF stored inside 'professional' column) -->
    <td>{{ $row->professional ?? 'Not Available' }}</td>

    <!-- Experience -->
    <!-- <td>{{ $row->experience . " year of Experience" }}</td> -->

    <!-- Actions -->
    <td>
        <div class="d-inline-flex gap-1">

            <!-- Edit -->
            <a href="{{ route('admin.edit_doctor_list', $row->id) }}"
               class="btn btn-outline-primary btn-sm">
                <i class="ri-edit-line"></i>
            </a>

            <!-- View (Your existing modal trigger) -->
            <!-- <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewRow">
                <i class="ri-eye-line"></i>
            </button> -->

            <!-- Delete -->
            <form method="POST" action="{{ route('admin.remove-doctor', $row->id) }}">
                @csrf
                <button type="button" class="btn btn-outline-danger btn-sm"
                        data-bs-toggle="modal" data-bs-target="#delRow{{ $row->id }}">
                    <i class="ri-delete-bin-line"></i>
                </button>

                <!-- Delete Modal -->
                <div class="modal fade" id="delRow{{ $row->id }}" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </td>
</tr>
@endforeach

                </tbody>
              </table>
            </div>
            <!-- Table ends -->

          </div>
        </div>
      </div>
    </div>
    <!-- Row ends -->
  </div>
  <!-- App body ends -->

</div>
<!-- App container ends -->
@endsection
