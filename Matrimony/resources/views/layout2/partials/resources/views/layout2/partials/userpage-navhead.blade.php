<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a href="index.html" class="logoimg d-flex align-items-center me-auto me-xl-0">
    <!-- Logo Image -->
    <img src="{{ asset('assets/images/custom/img.png') }}" alt="GlobalNadars Logo" class="logo-img me-2" style="width: 50px; height: auto;">
    
    <!-- Site Name -->
    <h2 class="sitename mb-0">G<span class="sitename1 mb-0">LOBAL </span>N<span class="sitename1 mb-0">ADARS</span></h2>
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

        <!-- Navigation Menu -->
        <nav id="navmenu" class="navmenu d-none d-xl-block">
            <ul class="list-unstyled m-0">
                <li class="py-2"><a href="{{ route('app.v2.home_page') }}">Home</a></li>
                <li class="py-2"><a href="{{ route('app.v2.matches_page') }}">Matches</a></li>
                <li class="py-2"><a href="{{ route('app.v2.searchpage') }}">Search</a></li>
                <li class="py-2"><a href="{{ route('app.v2.favoritespage') }}">Liked Profile</a></li>
                <li class="py-2"><a href="{{ route('app.v2.single_pagepage') }}">My Profile</a></li>
                <li class="py-2"><a href="{{ route('logoutv2') }}">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>
<style>
    .mobile-nav-toggle {
   width: 30px; 
    height: 30px; 
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    background: transparent; 
}

.mobile-nav-toggle:focus {
    outline: none; 
}

.bi-x::before  {
position: relative;
    bottom: 15px;
    right:10px;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.mobile-nav-toggle');
    const navmenu = document.querySelector('#navmenu');

    toggle.addEventListener('click', () => {
        navmenu.classList.toggle('d-none');
    });
});
</script>