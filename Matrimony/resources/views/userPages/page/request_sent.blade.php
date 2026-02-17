@extends('layout2.user-form')

@section('title')
Request Sent
@endsection

@section('content')
<div class="container mt-4 mb-4" >
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-3">
            <h3 style="color: #8C0000; font-size: 24px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
                <button class="btn" onclick="history.back()">
                    <i class="bi bi-arrow-left" style="font-size: 1.5rem;color:black;"></i>
                </button>Notification
            </h3>

            <div class="card p-4 mb-4">
                <a href="{{ route('app.v2.requestpage') }}">
                    <button class="btn btn-danger mb-3 w-100 {{ request()->routeIs('app.v2.requestpage') ? 'active' : '' }}">
                        <i class="fas fa-comments"></i> Contact Request
                    </button>
                </a>
                <a href="{{ route('app.v2.request_photo') }}">
                    <button class="btn btn-danger mb-3 w-100 {{ request()->routeIs('app.v2.request_photo') ? 'active' : '' }}">
                        <i class="fas fa-images"></i> Photo Request
                    </button>
                </a>
                <a href="{{ route('app.v2.favoritespage') }}">
                    <button class="btn btn-danger mb-3 w-100 {{ request()->routeIs('app.v2.favoritespage') ? 'active' : '' }}">
                        <i class="fas fa-heart"></i> Liked Profile
                    </button>
                </a>
                <a href="{{ route('app.v2.request_sent') }}">
                    <button class="btn btn-danger w-100 {{ request()->routeIs('app.v2.request_sent') ? 'active' : '' }}">
                        <i class="fas fa-paper-plane"></i> Request Sent
                    </button>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="wrapper-max">
                <div class="">
                    <div class="">
                        <h4 class="mb-0"><i class="fas fa-paper-plane me-2"></i> Requests Sent</h4>
                    </div>
                    
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs" id="requestTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" 
                                    data-bs-target="#all" type="button" role="tab" aria-controls="all" 
                                    aria-selected="true">
                                <i class="fas fa-list me-1"></i> All Requests
                                <span class="badge bg-secondary ms-1">{{ count($allRequests) }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="accepted-tab" data-bs-toggle="tab" 
                                    data-bs-target="#accepted" type="button" role="tab" 
                                    aria-controls="accepted" aria-selected="false">
                                <i class="fas fa-check-circle me-1"></i> Accepted
                                <span class="badge bg-success ms-1">{{ count($acceptedRequests) }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" 
                                    data-bs-target="#rejected" type="button" role="tab" 
                                    aria-controls="rejected" aria-selected="false">
                                <i class="fas fa-times-circle me-1"></i> Rejected
                                <span class="badge bg-danger ms-1">{{ count($rejectedRequests) }}</span>
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content p-3" id="requestTabsContent">
                        
                        <!-- All Requests Tab -->
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            @if(count($allRequests) > 0)
                                <?php $i = 1; ?>
                                @foreach($allRequests as $index => $requestData)
                                    @include('userPages.page.request_card', [
                                        'log' => $requestData['profile'],
                                        'index' => $i,
                                        'requestTypes' => $requestData['request_types'],
                                        'status' => $requestData['status'],
                                        'mobileRequest' => $mobileRequest,
                                        'logConditionsRequest' => $logConditionsRequest,
                                        'upprovePhoto' => $upprovePhoto,
                                        'viewProfile' => $viewProfile,
                                        'likedProfiles' => $likedProfiles
                                    ])
                                    <?php $i++; ?>
                                @endforeach
                                
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center mt-4 mb-5">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            @if ($userDetails->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">Previous</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $userDetails->previousPageUrl() }}" rel="prev">Previous</a>
                                                </li>
                                            @endif

                                            @foreach ($userDetails->getUrlRange(1, $userDetails->lastPage()) as $page => $url)
                                                @if ($page == $userDetails->currentPage())
                                                    <li class="page-item active">
                                                        <span class="page-link">{{ $page }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            @if ($userDetails->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $userDetails->nextPageUrl() }}" rel="next">Next</a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link">Next</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <img src="{{ asset('/images/no-data.png') }}" style="height:200px;width:230px;">
                                    <p class="text-muted mt-3">No requests sent yet.</p>
                                </div>
                            @endif
                        </div>

                        <!-- Accepted Tab -->
                        <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
                            @if(count($acceptedRequests) > 0)
                                <?php $j = 1; ?>
                                @foreach($acceptedRequests as $index => $requestData)
                                    @include('userPages.page.request_card', [
                                        'log' => $requestData['profile'],
                                        'index' => 1000 + $j, // Different index to avoid ID conflicts
                                        'requestTypes' => $requestData['request_types'],
                                        'status' => $requestData['status'],
                                        'mobileRequest' => $mobileRequest,
                                        'logConditionsRequest' => $logConditionsRequest,
                                        'upprovePhoto' => $upprovePhoto,
                                        'viewProfile' => $viewProfile,
                                        'likedProfiles' => $likedProfiles
                                    ])
                                    <?php $j++; ?>
                                @endforeach
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-check-circle text-muted" style="font-size: 4rem;"></i>
                                    <p class="text-muted mt-3">No accepted requests yet.</p>
                                </div>
                            @endif
                        </div>

                        <!-- Rejected Tab -->
                        <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                            @if(count($rejectedRequests) > 0)
                                <?php $k = 1; ?>
                                @foreach($rejectedRequests as $index => $requestData)
                                    @include('userPages.page.request_card', [
                                        'log' => $requestData['profile'],
                                        'index' => 2000 + $k, // Different index to avoid ID conflicts
                                        'requestTypes' => $requestData['request_types'],
                                        'status' => $requestData['status'],
                                        'mobileRequest' => $mobileRequest,
                                        'logConditionsRequest' => $logConditionsRequest,
                                        'upprovePhoto' => $upprovePhoto,
                                        'viewProfile' => $viewProfile,
                                        'likedProfiles' => $likedProfiles
                                    ])
                                    <?php $k++; ?>
                                @endforeach
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-times-circle text-muted" style="font-size: 4rem;"></i>
                                    <p class="text-muted mt-3">No rejected requests yet.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create a partial for the request card (userPages/partials/request_card.blade.php) -->
<style>
    .nav-tabs .nav-link {
        color: #666;
        font-weight: 500;
        border: none;
        padding: 12px 20px;
        position: relative;
    }
    
    .nav-tabs .nav-link.active {
        color: #8C0000;
        background-color: #fff;
        border-bottom: 3px solid #8C0000;
    }
    
    .nav-tabs .nav-link:hover {
        color: #8C0000;
    }
    
   
    .request-badge {
        font-size: 0.75rem;
        padding: 0.4em 0.8em;
    }
    
    .status-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1;
    }
</style>

<script>
    // Function to handle profile view request
    function profilerequest(index) {
        let profileId = document.getElementById(`profile_ids${index}`).value;
        let userId = document.getElementById(`user_ids${index}`).value;
        let name = document.getElementById(`names${index}`).value;

        $.ajax({
            url: "{{ route('app.v2.request_profileView') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                profile_ids: profileId,
                user_ids: userId,
                names: name
            },
            success: function (results) {
                if (results.success) {
                    document.getElementById(`profile_view${index}`).style.display = 'none';
                    document.getElementById(`sends${index}`).style.display = 'block';
                } else {
                    alert(results.success || "An error occurred. Please try again.");
                }
            },
            error: function (xhr) {
                console.error(xhr);
                alert("An error occurred. Please check the console for details.");
            }
        });
    }

    // Function to view profile
    function view_person(event, element) {
        event.preventDefault();
        
        var profile_id = $(element).data('profile-id');
        var name = $(element).data('name');
        var user_id = $(element).data('user-id');

        $.ajax({
            url: "{{ route('app.v2.request_profile') }}",
            type: "POST",
            data: {
                profile_id: profile_id,
                name: name,
                user_id: user_id,
                _token: "{{ csrf_token() }}"
            },
            success: function (results) {
                if (results.success) {
                    window.open($(element).find('a').attr('href'), '_blank');
                } else {
                    alert(results.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    }
</script>
@endsection