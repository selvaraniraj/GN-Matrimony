<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <!-- <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <link href="{{ asset('assets/images/custom/img.png') }}" rel="icon">
            <h1 class="sitename">GlobalNadars</h1>
        </a> -->

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

    /* @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounce {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-10px);
        }
    } */
</style>
        <!-- Mobile Nav Toggle Icon -->
        <button class="mobile-nav-toggle d-xl-none bi bi-list" aria-label="Toggle navigation"></button>

        <!-- Navigation Menu -->
        <nav id="navmenu" class="navmenu d-none d-xl-block">
            <ul>
                <li><a href="{{ route('app.v2.home_page') }}">முகப்பு</a></li>
                <li><a href="{{ route('app.v2.aboutUsPage_page') }}">எங்களை பற்றி</a></li>
                <li><a href="{{ route('app.v2.galleryPage_page') }}">வலைப்பதிவு</a></li>
                <li><a href="{{ route('app.v2.members_page') }}">உறுப்பினர்கள்</a></li>
                <li><a href="{{ route('app.v2.contactusPage_page') }}">தொடர்பு தகவல்</a></li>
                <li><a href="{{ route('app.v2.loginPage_page') }}">பயனர் உள்நுழைவு</a></li>
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
.bi-x::before  {
position: relative;
    bottom: 15px;
    right:10px;
}
.mobile-nav-toggle:focus {
    outline: none; 
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
