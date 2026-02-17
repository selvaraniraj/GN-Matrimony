<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Association</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
  <style>
.sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #ce1212;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    transition: width 0.3s ease;
}

.sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
}

.sitename {
    font-size: 24px;
    font-weight: bold;
    color: white;
    transition: opacity 0.3s ease;
}

/* Sidebar Toggler */
.sidebar-toggler {
    color: white;
    font-size: 25px;
    background: none;
    border: none;
    margin-left:15px;
    cursor: pointer;
}

.sidebar-toggler:focus {
    outline: none;
}

/* Hide sitename on small screens */
.sidebar.collapsed .sitename {
    display: none;
}

/* Sidebar collapsed state for mobile */
.sidebar.collapsed {
    width: 80px;
}

.sidebar.collapsed + .main-content {
    margin-left: 80px;
}

/* Media Queries */
@media (max-width: 768px) {
    .sidebar .sitename {
        display: none;  /* Hide text on smaller screens */
    }
    
    .sidebar .sidebar-toggler {
        font-size: 25px; /* Make the toggle button smaller */
    }

    .sidebar {
        width: 100px;
    }

    .main-content {
        margin-left: 100px;
    }
}

@media (max-width: 576px) {
    .sidebar .sitename {
        display: none;  /* Hide text on smaller screens */
    }

    .sidebar .sidebar-toggler {
        font-size: 25px; /* Make the toggle button smaller */
    }

    .sidebar {
        width: 80px;
    }

    .main-content {
        margin-left: 80px;
    }
}
.main-content {
    margin-left: 250px;
    padding: 20px;
}

.new-association-heading {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #ce1212;
}

.custom-hr {
    border: 1px solid #ce1212;
}

.save-button {
    background-color: #ce1212;
    color: white;
    padding: 10px 30px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
}

.required-field::after {
    content: " *";
    color: #ce1212;
}

.sidebar-nav {
    width: 100%;
    list-style: none;
    padding-left: 0;
}

.sidebar-nav .nav-item {
    margin: 10px 0;
}

.sidebar-nav .nav-link {
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.sidebar-nav .nav-link:hover {
    color: #f8f9fa;
    background-color: #b81b1b;
}

.sidebar-nav .nav-link i {
    margin-right: 10px;
}

.sidebar .sub-nav {
    display: none;
    list-style: none;
    padding-left: 0;
    margin: 0;
}

.sidebar .sub-nav .nav-item {
    margin: 8px 0;
}

.sidebar .sub-nav .nav-link {
    color: #fff;
}

.sidebar .nav-item.active .sub-nav {
    display: block;
}

.sidebar .nav-item .fa-angle-left {
    transition: transform 0.3s ease;
}

.sidebar .nav-item.active .fa-angle-left {
    transform: rotate(90deg);
}


.sidebar .sub-nav {
    display: none;
}

.sidebar .nav-item.active .sub-nav {
    display: block;
}

.sidebar .nav-item .fa-angle-left {
    transition: transform 0.3s ease;
}

.sidebar .nav-item.active .fa-angle-left {
    transform: rotate(90deg);
}

@media (max-width: 768px) {
    .sidebar {
        width: 100px;
    }

    .main-content {
        margin-left: 100px;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .sidebar .nav-link span {
        display: none; /* Hide text on smaller devices */
    }

    .sidebar .nav-link i {
        font-size: 20px; /* Ensure icons are large enough on small screens */
    }
}

@media (max-width: 576px) {
    .sidebar {
        width: 80px;
    }

    .main-content {
        margin-left: 80px;
    }

    .sidebar .nav-link span {
        display: none; /* Hide text on smaller devices */
    }

    .sidebar .nav-link i {
        font-size: 20px; /* Ensure icons are large enough on small screens */
    }
}

.table td, .table th {
    word-wrap: break-word;
    white-space: normal;
}

.table td, .table th {
    min-width: 100px;
}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.modal-dialog.large-modal {
    max-width: 90%;
    margin: 1.75rem auto;
}

@media (min-width: 992px) {
    .modal-dialog.large-modal {
        max-width: 70%;
    }
}

@media (max-width: 576px) {
    .modal-dialog.large-modal {
        max-width: 100%;
        margin: 0.5rem;
    }
}

.modal-body {
    max-height: 80vh;
    overflow-y: auto;
}

.main {
    background-color: #f8f9fa;
    padding-top: 50px;
    padding-bottom: 50px;
}

.card {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.btn-danger {
    background-color: #D32F2F;
    border-color: #D32F2F;
    padding: 12px;
    font-size: 16px;
    border-radius: 5px;
}

.btn-danger:hover {
    background-color: #C62828;
    border-color: #C62828;
}

.form-control {
    border-radius: 5px;
    padding: 12px;
    font-size: 14px;
    margin-bottom: 10px;
}

.error {
    display: none;
    font-size: 13px;
    color: #f00;
}

.card-body {
    padding: 30px;
}

</style>

  
</head>
<body>

  <!-- Sidebar -->
  <aside id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <div class="sitename">Matrimony</div>
        <button class="sidebar-toggler" id="sidebar-toggler">
        &#9776;
      </button>

    </div>


    <ul class="sidebar-nav">
        <!-- Dashboard Section -->
        <li class="nav-item">
            <a class="nav-link" href="" id="dashboard-toggle">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
                <i class="fas fa-angle-left ml-auto"></i>
            </a>
            <ul class="sub-nav" id="dashboard-sub-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('association_form')}}">
                        <i class="fas fa-plus-circle"></i>
                        <span>Add Association</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('association_view')}}">
                        <i class="fas fa-file-alt"></i>
                        <span>Association Report</span>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{route('member-registration')}}">
                        <i class="fas fa-user-plus"></i>
                        <span>Member Registration</span>
                    </a>
                </li>
               
               
                <ul class="sidebar-nav">
    
    
    <li class="nav-item">
    <a class="nav-link" href="#" id="report-toggle">
        <i class="fas fa-tachometer-alt"></i>
        <span>Request Reports</span>
        <i class="fas fa-angle-left ml-auto"></i>
    </a>
    <ul class="sub-nav" id="report-sub-nav" style="display: none;">
        <li class="nav-item">
            <a class="nav-link" href="{{route('activity_report')}}">
                <i class="fas fa-file-alt"></i>
                <span>Profile Request Report</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('mobile_request')}}">
                <i class="fas fa-file-alt"></i>
                <span>Mobile Request Report</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('photo_request')}}">
                <i class="fas fa-file-alt"></i>
                <span>Photo Request Report</span>
            </a>
        </li>
    
      </ul>
</li>
   
</ul>
        
</aside>
<div class="main-content">
    @yield('main')
</div>
<div class="modal fade" id="fetchdetails" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog large-modal">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:#ce1212; display: flex; justify-content: center; align-items: center; text-align: center; color: white;">
                <h5 class="modal-title text-center">View Details</h5>
                <button type="button" class="close" style="color:white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body" id="details">
    <!-- Personal Details Section -->
    <div class="personal-details row">
        <h4 class="text-center text-danger mb-4 w-100">Personal Details for <span id="profile_id"></span></h4>

        
        <!-- First Column (Left) - First 9 fields -->
        <div class="col-md-4" style='padding-left:50px;'>
            <p><span style="display: inline-block; width: 60px;"><strong>Name:</strong></span> 
                <span id="member-name"></span></p>
            <p><span style="display: inline-block; width: 65px;"><strong>Gender:</strong></span>
                <span id="member-gender"></span></p>
            <p><span style="display: inline; width: 100px;"><strong>Date Of Birth:</strong></span>
                <span id="member-dob"></span></p>
            <p><span style="display: inline-block; width: 90px;"><strong>Birth Time:</strong></span>
                <span id="member-birthtime"></span></p>
            <p><span style="display: inline-block; width: 40px;"><strong>Age:</strong></span>
                <span id="member-age"></span></p>
            <p><span style="display: inline-block; width: 60px;"><strong>Height:</strong></span>
                <span id="member-height"></span></p>
            <p><span style="display:inline-block;width:70px;"><strong>Religion:</strong></span>
                <span id='member-religion'></span></p>
            <p><span style="display:inline-block;width:70px;"><strong>Caste:</strong></span>
                <span id='member-caste'></span></p>
            
                               
               
        </div>
        
        
        <div class="vertical-divider"></div>

        
        <!-- Second Column (Right) - Remaining fields -->
        <div class="col-md-4" >
        <p><span style="display: inline-block; width: 70px;"><strong>Parents:</strong></span>
        <span id="member-parents"></span></p>
        <p><span style="display: inline; width: 120px;"><strong>Mother Tongue:</strong></span>
        <span id="member-mothertongue"></span></p>
       
            <p><span style="display: inline-block; width: 90px;"><strong>Created By:</strong></span>
                <span id="member-relation"></span></p>
            <p><span style="display: inline-block; width: 50px;"><strong>Raasi:</strong></span>
                <span id="member-raasi"></span></p>
            <p><span style="display: inline-block; width: 50px;"><strong>Star:</strong></span>
                <span id="member-star"></span></p>
            <p><span style="display: inline-block; width: 90px;"><strong>Birth Place:</strong></span>
                <span id="birth_place"></span></p>
            <p><span style="display: inline-block; width: 70px;"><strong>Native:</strong></span>
                <span id="native_place"></span></p>
            
           
                <p><span style="display: inline; width: 120px;"><strong>Parent Contact No:</strong></span>
                <span id="parent-contact"></span></p>
        </div>

        <div class='col-md-4' style='padding-left:50px'>
        <p><span style="display: inline; width: 120px;"><strong> No.of siblings:</strong></span>
        <span id="brother-sisters"></span></p>
        

        <p><span style="display: inline-block; width: 110px;"><strong>Qualification:</strong></span>
        <span id="member-education"></span></p>
        <p><span style="display: inline; width: 70px;"><strong>College Name:</strong></span>
                <span id="member-college"></span></p>
        <p><span style="display: inline; width: 70px;"><strong>Company Name:</strong></span>
        <span id="member-office"></span></p>
        <p><span style="display: inline-block; width: 70px;"><strong>Income:</strong></span>
        <span id="member-income"></span></p>
        <p><span style="display: inline-block; width: 100px;"><strong>Designation:</strong></span>
        <span id="member-designation"></span></p>
        <p><span style="display: inline-block; width: 60px;"><strong>Email:</strong></span>
                <span id="member-email"></span></p>
                <p><span style="display: inline-block; width: 70px;"><strong>Mobile:</strong></span>
                <span id="member-mobile"></span></p>
           

</div>
    </div>

    <!-- Divider between Personal Details and Horoscope Section -->
    <hr class="my-4">

    <!-- Horoscope Section -->
    <div class="horoscope-details">
        <h4 class="text-center text-danger mb-3">Horoscope Details</h4>
        <div class="row gy-4 pt-3">
            <div class="col-md-6 text-start">
                <fieldset>
                    <table class="table table-bordered table-hover align-middle">
                        <colgroup>
                            <col style="width: 25%;">
                            <col style="width: 25%;">
                            <col style="width: 25%;">
                            <col style="width: 25%;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td><span id="rasi_1"></span></td>
                                <td><span id="rasi_2"></span></td>
                                <td><span id="rasi_3"></span></td>
                                <td><span id="rasi_4"></span></td>
                            </tr>
                            <tr>
                                <td><span id="rasi_5"></span></td>
                                <td colspan="2" rowspan="2" class="text-center align-middle">Rasi</td>
                                <td><span id="rasi_6"></span></td>
                            </tr>
                            <tr>
                                <td><span id="rasi_7"></span></td>
                                <td><span id="rasi_8"></span></td>
                            </tr>
                            <tr>
                                <td><span id="rasi_9"></span></td>
                                <td><span id="rasi_10"></span></td>
                                <td><span id="rasi_11"></span></td>
                                <td><span id="rasi_12"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <div class="col-md-6">
                <fieldset>
                    <table class="table table-bordered table-hover align-middle">
                        <colgroup>
                            <col style="width: 25%;">
                            <col style="width: 25%;">
                            <col style="width: 25%;">
                            <col style="width: 25%;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td><span id="Navamsam_1"></span></td>
                                <td><span id="Navamsam_2"></span></td>
                                <td><span id="Navamsam_3"></span></td>
                                <td><span id="Navamsam_4"></span></td>
                            </tr>
                            <tr>
                                <td><span id="Navamsam_5"></span></td>
                                <td colspan="2" rowspan="2" class="text-center align-middle">Navamsam</td>
                                <td><span id="Navamsam_6"></span></td>
                            </tr>
                            <tr>
                                <td><span id="Navamsam_7"></span></td>
                                <td><span id="Navamsam_8"></span></td>
                            </tr>
                            <tr>
                                <td><span id="Navamsam_9"></span></td>
                                <td><span id="Navamsam_10"></span></td>
                                <td><span id="Navamsam_11"></span></td>
                                <td><span id="Navamsam_12"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>

    <div class="row gy-4 pt-3">
        <div class="col-md-12 text-center">
            <h6>Note</h6>
            <img src="{{ asset('assets/images/custom/horosocope.png') }}" class="img-fluid" alt="Horoscope Image">
        </div>
    </div>
</div>
