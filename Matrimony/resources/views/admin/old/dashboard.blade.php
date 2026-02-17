
@include('admin.admin_header')
@include('admin.admin_left_menu')

<div class="content-wrapper">
   <!-- Content Header -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">

         <!-- Info boxes -->
         <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
               <a href="#">
                  <div class="info-box bg-gradient-info">
                     <span class="info-box-icon"><i class="far fa-user"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Association</span>
                        <span class="info-box-number">Accoiation count</span>
                     </div>
                  </div>
               </a>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
               <a href="#">
                  <div class="info-box bg-gradient-success">
                     <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Matrimony Members</span>
                        <span class="info-box-number">Member Count</span>
                     </div>
                  </div>
               </a>
            </div>

            <!-- <div class="col-md-3 col-sm-6 col-12">
               <a href="#">
                  <div class="info-box bg-gradient-warning">
                     <span class="info-box-icon"><i class="fas fa-project-diagram"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Projects</span>
                        <span class="info-box-number">Project Conut</span>
                     </div>
                  </div>
               </a>
            </div> -->

         </div>


      </div>
   </div>
</div>

@include('admin.admin_footer')
