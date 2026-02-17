<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <span class="brand-link text-center">
        <span class="brand-text font-weight-light">
            <h4>GNM</h4>
        </span>
    </span>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" 
                data-widget="treeview" 
                role="menu" 
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="#" 
                       class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
      Association Master
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('association_form')}}" class="nav-link">
         <i class="far fa-plus-square nav-icon"></i>
        <p>Add Association</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('association_view')}}" class="nav-link">
       <i class="far fa-circle nav-icon"></i> 
        <p>Association Report</p>
      </a>
    </li> 
  </ul>
</li>


                <li class="nav-item">
                    <a href="{{route('member-registration')}}" 
                       class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Member Registration</p>
                    </a>
                </li>


                
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-ticket-alt"></i>
    <p>
      Request Report
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('activity_report')}}" class="nav-link">
         <i class="far fa-circle nav-icon"></i>
        <p>Profile Request</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('mobile_request')}}" class="nav-link">
       <i class="far fa-circle nav-icon"></i> 
        <p>Photo Request</p>
      </a>
    </li> 

 <li class="nav-item">
      <a href="{{route('photo_request')}}" class="nav-link">
       <i class="far fa-circle nav-icon"></i> 
        <p>Mobile Request</p>
      </a>
    </li> 

  </ul>
</li>

            </ul>
        </nav>
    </div>
</aside>
