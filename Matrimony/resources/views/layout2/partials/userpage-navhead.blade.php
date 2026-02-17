<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a href="index.html" class="logoimg d-flex align-items-center me-auto me-xl-0">
    <!-- Logo Image -->
    <img src="{{ asset('assets/images/custom/logo2.svg') }}" alt="GlobalNadars Logo" class="logo-img me-2" style="width: 50px; height: auto;">
    
    <!-- Site Name -->
    <h2 class="sitename mb-0">
        G<span class="sitename1 mb-0">LOBAL </span>
        N<span class="sitename1 mb-0">ADARS</span>
     </h2>
</a>

<!-- Custom CSS for Styling -->
<style>
     .logoimg {
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .logo-img {
        max-width: 100%;
        height: auto;
    }
    .sitename {
        font-size: 1.5rem;
        font-weight: bold;
        color:#691b0f; /* Adjust color as needed */
        animation: fadeIn 2s ease-in-out, bounce 1s infinite alternate;
    }
    .sitename1 {
        font-size: 1rem;
        font-weight: bold;
        color: #691b0f; /* Adjust color as needed */
        /* animation: fadeIn 2s ease-in-out, bounce 1s infinite alternate; */
    }
    </style>

        <!-- Mobile Nav Toggle Icon -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        @php
    $isBasicFormPage = Route::currentRouteName() === 'app.v2.basic_information';
@endphp

<nav id="navmenu" class="navmenu d-none d-xl-block">
    <ul class="list-unstyled m-0">
        <li class="py-2">
            <a 
                href="{{ route('app.v2.user_profile_page') }}" 
                @if($isBasicFormPage) style="pointer-events: none; opacity: 0.5;" @endif
            >My Profile</a>
        </li>

        <li class="py-2">
            <a 
                href="{{ route('app.v2.matches_page') }}" 
                @if($isBasicFormPage) style="pointer-events: none; opacity: 0.5;" @endif
            >Matches</a>
        </li>

        <li class="py-2">
            <a 
                href="{{ route('app.v2.searchpage') }}" 
                @if($isBasicFormPage) style="pointer-events: none; opacity: 0.5;" @endif
            >Search</a>
        </li>

        <li class="py-2">
            <a 
                href="{{ route('app.v2.requestpage') }}" 
                class="position-relative"
                @if($isBasicFormPage) style="pointer-events: none; opacity: 0.5;" @endif
            >
                <i class="bi bi-bell-fill notification-icon"></i>
                @if(isset($notificationCount) && $notificationCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1">
                        {{ $notificationCount }}
                    </span>
                @endif
            </a>
        </li>

        

        <li class="py-2 user-info">
            <a 
                href="{{ route('app.v2.single_pagepage') }}" 
                class="user-link"
                @if($isBasicFormPage) style="pointer-events: none; opacity: 0.5;" @endif
            >
                @if(!empty($upload_image))
                    <img src="{{ asset($upload_image) }}" alt="User Image" class="me-2 rounded-circle user-image" width="30" height="30">
                @else
                    <img src="{{ asset('/images/user_image.png') }}" alt="Image" class="me-2 rounded-circle user-image" width="30" height="30">
                @endif
                <span class="user-name">{{ $memberName ?? 'Guest' }}</span>
            </a>
        </li>

        <li class="py-2">
            <a 
                href="{{ route('logoutv2') }}" 
                class="logout-link"
                @if($isBasicFormPage) style="pointer-events: none; opacity: 0.5;" @endif
            >
                <i class="bi bi-box-arrow-right logout-icon"></i>
            </a>
        </li>

    </ul>
</nav>

    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const currentUrl = window.location.href;
        const navLinks = document.querySelectorAll('.navmenu ul li a');

        navLinks.forEach(link => {
            if (link.href === currentUrl) {
                link.classList.add('active');
            }
        });

        // Mobile Menu Toggle
        const toggle = document.querySelector('.mobile-nav-toggle');
        const navmenu = document.querySelector('#navmenu');

        if (toggle) {
            toggle.addEventListener('click', () => {
                navmenu.classList.toggle('d-none');
            });
        }
    });
</script>
