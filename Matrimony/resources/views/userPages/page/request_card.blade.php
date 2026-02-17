@php
    $log = $log ?? null;
    $index = $index ?? 1;
    $requestTypes = $requestTypes ?? [];
    $status = $status ?? 'pending';
@endphp

@if($log)
<input type="hidden" name="profile_id" id="view_id{{ $index }}" value="{{ $log->id }}">
<input type="hidden" name="name" id="name{{ $index }}" value="{{ $log->name }}">
<input type="hidden" name="user_id" id="user_id{{ $index }}" value="{{ $log->user_id }}">
<input type="hidden" name="profile_ids" id="profile_ids{{ $index }}" value="{{ $log->id }}">
<input type="hidden" name="names" id="names{{ $index }}" value="{{ $log->name }}">
<input type="hidden" name="user_ids" id="user_ids{{ $index }}" value="{{ $log->user_id }}">

<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm position-relative">
            <!-- Status Badge -->
            <span class="status-badge badge 
                @if($status == 'accepted') bg-success
                @elseif($status == 'rejected') bg-danger
                @else bg-secondary @endif">
                @if($status == 'accepted') Accepted
                @elseif($status == 'rejected') Rejected
                @else Pending @endif
            </span>

            <div class="card-body" style="border:2px solid #e5e5e5;">
                <div class="row align-items-center">
                    <!-- Profile Image -->
                    <div class="col-md-3 text-center">
                        @php
                            $profileId = $log->id;
                        @endphp

                        @if (in_array($profileId, $upprovePhoto))
                            @if(!empty($log->file_path))
                                <div class="profile-container d-inline-block position-relative">
                                    <img src="{{ asset($log->file_path) }}" class="rounded-circle" width="100" height="100" alt="Profile Image">
                                </div>
                            @else
                                <div class="profile-container d-inline-block position-relative">
                                    <img src="{{ asset('/images/user_image.png') }}" class="rounded-circle" width="100" height="100" alt="Default Image">
                                </div>
                            @endif
                        @else
                            <div class="profile-container d-inline-block position-relative">
                                <img src="{{ asset('/images/user_image.png') }}" class="rounded-circle" width="100" height="100" alt="Default Image">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#iconModal{{ $index }}"
                                   class="lock-icon position-absolute bottom-0 rounded-circle"
                                   style="top:50px;left:65px;">
                                    <i class="bi bi-person-fill-lock fs-4 text-dark"></i>
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Profile Details -->
                    <div class="col-md-6">
                        
<a href="{{ route('app.v2.popupView_page', ['id' => base64_encode($log->id)]) }}" 
                               target="_blank" onclick="view_person(event, this)"
                               data-profile-id="{{ $log->id }}" 
                               data-name="{{ $log->name }}"
                               data-user-id="{{ $log->user_id }}">

                               <h5 class="card-title" style="font-weight: bold;color:#8C0000;">
                            {{ $log->name ?? 'Unknown' }}
                             (   {{ $log->profile_id ?? 'Profile Id' }} )

                                </h5>
                            </a>

                        
                           @php
                                $dob = $log->dob;
                                $age = \Carbon\Carbon::parse($dob)->age;
                            @endphp
                            <p class="mb-1"><strong>Age:</strong> {{ $age }}</p>
                        <p class="mb-1"><strong>Height:</strong> {{ $log->additionalDetails->height->name ?? 'N/A' }}</p>
                           <p class="mb-1"><strong>company:</strong> {{$log->additionalDetails->company_name ?? 'N/A' }} </p>
                        <p class="mb-1"><strong>Location:</strong> {{ $log->village}}</p>

                        <!-- Request Types -->
                        <div class="mt-2">
                            @foreach($requestTypes as $type)
                                @if($type == 'interest')
                                    <span class="badge bg-success request-badge me-1">
                                        <i class="fas fa-heart me-1"></i> Interest
                                    </span>
                                @elseif($type == 'mobile')
                                    <span class="badge bg-primary request-badge me-1">
                                        <i class="fas fa-phone me-1"></i> Mobile
                                    </span>
                                @elseif($type == 'photo')
                                    <span class="badge bg-warning text-dark request-badge me-1">
                                        <i class="fas fa-image me-1"></i> Photo
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Quick Info -->
                    <!-- <div class="col-md-3">
                        <div class="text-end">
                          
                         
                            <p class="mb-1"><strong>Religion:</strong> {{ $log->religion ?? 'N/A' }}</p>
                            @if (in_array($profileId, $viewProfile))
                                <span class="badge bg-info">Viewed</span>
                            @endif
                        </div>
                    </div> -->


                </div>
            </div>
        </div>
    </div>
</div>

<!-- Photo Request Modal -->
<div class="modal fade" id="iconModal{{ $index }}" tabindex="-1" aria-labelledby="iconModalLabel{{ $index }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="iconModalLabel{{ $index }}">
                    <i class="bi bi-shield-lock-fill me-2"></i> Request to View Profile
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('/images/user_image.png') }}" alt="Secure Profile" 
                     class="img-fluid rounded-circle mb-3" width="120">
                <h5>{{ $log->name ?? 'Unknown' }}</h5>
                <p>This profile is private. You need to request permission to view photos.</p>
            </div>
            <div class="modal-footer justify-content-center">
                @if (in_array($log->id, $logConditionsRequest))
                    <span id="requestedsend{{ $index }}" class="text-success px-4">
                        <i class="bi bi-check-circle me-1"></i> Request Sent
                    </span>
                @else
                    <button type="button" class="btn btn-success px-4" id="profile_view{{ $index }}" 
                            onclick="profilerequest({{ $index }})">
                        <i class="bi bi-send me-1"></i> Send Request
                    </button>
                    <span id="sends{{ $index }}" class="text-success px-4" style="display: none;">
                        <i class="bi bi-check-circle me-1"></i> Request Sent
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
@endif


<style>
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
    }
    
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 10px 20px;
        position: relative;
        transition: all 0.3s;
    }
    
    .nav-tabs .nav-link:hover {
        color: #8C0000;
        background-color: rgba(140, 0, 0, 0.05);
    }
    
    .nav-tabs .nav-link.active {
        color: #8C0000;
        background-color: white;
        border: none;
        border-bottom: 3px solid #8C0000;
    }
    
    .nav-tabs .nav-item {
        margin-bottom: 0;
    }
    
    .tab-content {
        background-color: white;
        /* border-left: 1px solid #dee2e6;
        border-right: 1px solid #dee2e6; */
        /* border-bottom: 1px solid #dee2e6; */
        border-radius: 0 0 5px 5px;
    }
    
    .profile-card {
        transition: transform 0.2s;
    }
    
    .profile-card:hover {
        transform: translateY(-2px);
    }
    
    .lock-icon {
        background-color: white;
        padding: 5px;
        box-shadow: 0 0 5px rgba(0,0,0,0.2);
    }
</style>