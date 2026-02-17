<!-- Main container starts -->
<div class="main-container">

  <!-- Sidebar wrapper starts -->
  <nav id="sidebar" class="sidebar-wrapper">

    <!-- Sidebar profile starts -->
    <div class="sidebar-profile">
      <!-- <img src="{{ asset('admin_assets/images/logo2.svg') }}" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates"> -->
      <div class="m-0">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark">
          
        <h5 class="mb-1 profile-name text-center">Global Nader</h5>
        <!-- <p class="m-0 small profile-name text-nowrap text-truncate">Dept Admin</p> -->
</a>
      </div>
    </div>
    <!-- Sidebar profile ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll">
      <ul class="sidebar-menu">

        <!-- Doctors menu -->
        <li class="treeview">
          <a href="#!">
            <i class="ri-nurse-line"></i>
            <span class="menu-text">Profile</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="">Add Matrimony prfoile </a></li>
             <li><a href="{{ route ('admin.matrimony.index') }}">Profile List</a></li>
          </ul>
        </li>

         <!-- Doctors menu -->
        <li class="treeview">
          <a href="#!">
            <i class="ri-nurse-line"></i>
            <span class="menu-text">Request List</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.requests.contact') }}">Contact Request</a></li>
            <li><a href="{{ route('admin.requests.photo') }}">Photo Request</a></li>
            <li><a href="{{ route('admin.requests.liked') }}">Interest Request</a></li>
          </ul>
        </li>


        
      </ul>
    </div>
    <!-- Sidebar menu ends -->

  </nav>
  <!-- Sidebar wrapper ends -->

