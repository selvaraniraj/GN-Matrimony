@extends('admin.layouts.dash-layout')

@section('content')
<style>
  @media print {
    .no-print,
    .app-header,
    .app-hero-header,
    .app-footer,
    #sidebar,
    .sidebar-wrapper,
    .toggle-sidebar,
    .pin-sidebar {
      display: none !important;
    }
    .app-body {
      padding: 0 !important;
      margin: 0 !important;
    }
    .card {
      border: 0 !important;
      box-shadow: none !important;
    }
  }
</style>

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
        Profile Details
      </li>
    </ol>
  </div>
  <!-- App Hero header ends -->

  <!-- App body starts -->
  <div class="app-body">
    <div class="row gx-3">
      <div class="col-sm-12">
        <div class="card printable-area">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title">
              {{ $member->name ?? '-' }} ({{ $member->profile_id ?? '-' }})
            </h5>
            <div class="d-flex gap-2 no-print">
              <button class="btn btn-outline-secondary btn-sm" onclick="window.print()">
                Print
              </button>
              <button class="btn btn-outline-primary btn-sm" onclick="window.print()">
                Download PDF
              </button>
              <button class="btn btn-success btn-sm" onclick="shareOnWhatsApp()">
                Share WhatsApp
              </button>
            </div>
          </div>
          <div class="card-body">

            <!-- Basic Info -->
            <h6 class="text-uppercase text-muted mb-2">Basic Info</h6>
            <div class="table-responsive mb-4">
              <table class="table table-bordered m-0">
                <tbody>
                  <tr>
                    <th>Name</th>
                    <td>{{ $member->name ?? '-' }}</td>
                    <th>Profile Id</th>
                    <td>{{ $member->profile_id ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Gender</th>
                    <td>{{ $member->gender ?? '-' }}</td>
                    <th>DOB / Age</th>
                    <td>
                      {{ $member->dob ? \Carbon\Carbon::parse($member->dob)->format('d-m-Y') : '-' }}
                      / {{ $member->age ?? '-' }}
                    </td>
                  </tr>
                  <tr>
                    <th>Mobile</th>
                    <td>{{ $member->mobile ?? '-' }}</td>
                    <th>Email</th>
                    <td>{{ $member->email ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Religion</th>
                    <td>{{ $member->religion ?? '-' }}</td>
                    <th>Caste</th>
                    <td>{{ $member->caste ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Mother Tongue</th>
                    <td>{{ $member->mothertongue ?? '-' }}</td>
                    <th>Created By</th>
                    <td>{{ $member->created_by_relation ?? '-' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Personal Info -->
            <h6 class="text-uppercase text-muted mb-2">Personal Details</h6>
            <div class="table-responsive mb-4">
              <table class="table table-bordered m-0">
                <tbody>
                  <tr>
                    <th>Birth Place</th>
                    <td>{{ $member->birth_place ?? '-' }}</td>
                    <th>Native Place</th>
                    <td>{{ $member->village ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Permanent Village</th>
                    <td>{{ $member->permanent_village ?? '-' }}</td>
                    <th>Marital Status</th>
                    <td>{{ $member->maritalstatus ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Height</th>
                    <td>{{ optional(optional($member->additionalDetails)->height)->name ?? '-' }}</td>
                    <th>Disability</th>
                    <td>{{ $member->disability ?? '-' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Family Info -->
            <h6 class="text-uppercase text-muted mb-2">Family Details</h6>
            <div class="table-responsive mb-4">
              <table class="table table-bordered m-0">
                <tbody>
                  <tr>
                    <th>Father</th>
                    <td>{{ optional($member->familyDetails)->father_name ?? '-' }}</td>
                    <th>Mother</th>
                    <td>{{ optional($member->familyDetails)->mother_name ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Brothers</th>
                    <td>{{ optional($member->familyDetails)->number_of_brothers ?? '-' }}</td>
                    <th>Sisters</th>
                    <td>{{ optional($member->familyDetails)->number_of_sisters ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Parent Contact</th>
                    <td colspan="3">{{ optional($member->familyDetails)->parent_contact_number ?? '-' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Horoscope Info -->
            <h6 class="text-uppercase text-muted mb-2">Horoscope Details</h6>
            <div class="table-responsive mb-4">
              <table class="table table-bordered m-0">
                <tbody>
                  <tr>
                    <th>Raasi</th>
                    <td>{{ optional($member->raasi)->name ?? '-' }}</td>
                    <th>Star</th>
                    <td>{{ optional($member->star)->name ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Birth Time</th>
                    <td>
                      @php
                        $hours = $member->hours;
                        $mins = $member->mins;
                        $amPm = $member->am_pm;
                      @endphp
                      @if($hours && $mins && $amPm)
                        {{ sprintf('%02d:%02d %s', $hours, $mins, $amPm) }}
                      @else
                        -
                      @endif
                    </td>
                    <th>Dosham</th>
                    <td>{{ $member->dosham ?? '-' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

          @if($member->horoscopeDetail)
<h6 class="text-uppercase text-muted mb-2">Horoscope Chart</h6>

<style>
  .horoscope-row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
  }

  .horoscope-box {
    flex: 1 1 48%;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    background: #fff;
  }

  .horoscope-header {
    padding: 10px 14px;
    font-weight: 600;
    border-bottom: 1px solid #dee2e6;
    background: #f8f9fa;
    text-align: center;
  }

  .horoscope-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(4, 1fr);
    border: 1px solid #222;
    aspect-ratio: 1 / 1;
  }

  .horoscope-cell {
    border-right: 1px solid #222;
    border-bottom: 1px solid #222;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    padding: 4px;
    text-align: center;
  }

  .horoscope-center {
    grid-column: 2 / 4;
    grid-row: 2 / 4;
    font-weight: 700;
    background: #f1f3f5;
    flex-direction: column;
  }

  @media (max-width: 768px) {
    .horoscope-box {
      flex: 1 1 100%;
    }
  }
</style>

<div class="horoscope-row mb-4">

  <!-- RASI -->
  <div class="horoscope-box">
    <div class="horoscope-header">Rasi (D-1)</div>
    <div class="p-3">
      <div class="horoscope-grid">
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_1 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_2 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_3 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_4 ?? '-' }}</div>

        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_5 ?? '-' }}</div>
        <div class="horoscope-cell horoscope-center">
          RASI
          <small>D-1</small>
        </div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_6 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_7 ?? '-' }}</div>

        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_8 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_9 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_10 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_11 ?? '-' }}</div>

        <div class="horoscope-cell">{{ $member->horoscopeDetail->rasi_12 ?? '-' }}</div>

      </div>
    </div>
  </div>

  <!-- NAVAMSAM -->
  <div class="horoscope-box">
    <div class="horoscope-header">Navamsam (D-9)</div>
    <div class="p-3">
      <div class="horoscope-grid">
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_1 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_2 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_3 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_4 ?? '-' }}</div>

        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_5 ?? '-' }}</div>
        <div class="horoscope-cell horoscope-center">
          NAVAMSAM
          <small>D-9</small>
        </div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_6 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_7 ?? '-' }}</div>

        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_8 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_9 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_10 ?? '-' }}</div>
        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_11 ?? '-' }}</div>

        <div class="horoscope-cell">{{ $member->horoscopeDetail->Navamsam_12 ?? '-' }}</div>
       
      </div>
    </div>
  </div>

</div>
@endif


            <!-- Education / Professional -->
            <h6 class="text-uppercase text-muted mb-2">Education & Professional</h6>
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <tbody>
                  <tr>
                    <th>Qualification</th>
                    <td>{{ optional(optional($member->educationDetails)->education)->name ?? '-' }}</td>
                    <th>College</th>
                    <td>{{ optional($member->educationDetails)->college_inst ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Company</th>
                    <td>{{ optional($member->educationDetails)->company_name ?? '-' }}</td>
                    <th>Designation</th>
                    <td>{{ optional($member->educationDetails)->destination ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Income</th>
                    <td colspan="3">{{ optional($member->educationDetails)->income ?? '-' }}</td>
                  </tr>
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

<script>
  function shareOnWhatsApp() {
    var name = @json($member->name ?? 'Profile');
    var profileId = @json($member->profile_id ?? '');
    var url = window.location.href;
    var text = name + (profileId ? ' (' + profileId + ')' : '') + ' - ' + url;
    var shareUrl = 'https://wa.me/?text=' + encodeURIComponent(text);
    window.open(shareUrl, '_blank');
  }
</script>
@endsection
