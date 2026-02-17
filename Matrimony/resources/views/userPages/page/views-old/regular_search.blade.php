@extends('layout2.user-form')

@section('title')
Regular_search
@endsection

@section('content')
<div class="container mt-4">
   <div class="row">
      <div class="col-md-3">
         <h4>Show the created profile</h4>
         <nav class="sidebar card py-2 mb-4">
            <ul class="nav flex-column" id="nav_accordion">
            <label class="nav-link" >Age</label>
            <select class="form-control" name="age">
               <option value ="Select" >Select</option>
               <option value ="business" >Age 21 to Age 22</option>
               <option value ="government" >Age 22 to Age 23</option>
               <option value ="private" >Age 23 to Age 25</option>
               <option value ="self employed" >Age 25 to Age 27</option>
               <option value ="others" >Age 27 to Age 30</option>
               <option value ="others" >Above Age 30</option>
            </select>
            <label class="nav-link" >Height</label>
            <select class="form-control" name="height">
               <option value="">Select</option>
               <option value="4">Upto 4.5ft</option>
               <option value="5">4.5ft to 5ft</option>
               <option value="6">5ft to 5.5ft</option>
               <option value="7">5.5ft to 6ft</option>
               <option value="9">Above 6ft</option>
            </select>
            <label class="nav-link" >Religion</label>
            <select class="form-control" name="height">
               <option value="">Select</option>
               <option value="4">Upto 4.5ft</option>
               <option value="5">4.5ft to 5ft</option>
               <option value="6">5ft to 5.5ft</option>
               <option value="7">5.5ft to 6ft</option>
               <option value="9">Above 6ft</option>
            </select>
         </nav>
      </div>
      <div class="col-md-9">
         <h5>PROFILES YET TO BE VIEWED </h5>
         <div class="d-flex justify-content-between align-items-center">
         </div>
         <div id="profileContainer" class="row">
            <div class="col-md-12 mb-4   profile-card" data-gender="bride">
               <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                  <div class="card">
                     <div class="row">
                        <div class="col-md-5 " style="padding-left:20px;" onclick="view_person()"><span style="padding-left:2px;">NA00-M-01</span> | <span>Profile created for Grand Daughter</span>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-md-5 pad_space ">
                        </div>
                        <div class="col-md-6 pt-3 ms-2">
                           <img src="{{asset('assets/images/custom/testimonials-2.jpg')}}" style="vertical-align:middle;" width=220 >
                        </div>
                        <div class="col-md-4">
                           <div class="card-body">
                              <h5 class="card-title">Sana</h5>
                              <p class="card-text">Age: 25</p>
                              <p class="card-text">Location: City A</p>
                              <p class="card-text">Profession: Software Engineer</p>
                              <p class="card-text">Company: ABC Corp</p>
                              <div class="row gy-4 pt-3">
                                 <div class="col-md-3 text-md-end text-start">
                                    <label >Interest</label>
                                 </div>
                                 <div class="col-md-6">
                                    <button class="btn btn-danger">
                                    <i class="fas fa-comments"></i>Yes
                                    </button>
                                    <button class="btn btn-danger" >
                                    <i class="fas fa-comments "></i>No
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="profileContainer" class="row">
            <div class="col-md-12 mb-4   profile-card" data-gender="bride">
               <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                  <div class="card">
                     <div class="row">
                        <div class="col-md-5 " style="padding-left:20px;" onclick="view_person()"><span style="padding-left:2px;">NA00-M-02</span> | <span>Profile created for Daughter</span>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-md-5 pad_space ">
                        </div>
                        <div class="col-md-6 pt-3 ms-2">
                           <img src="{{asset('assets/images/custom/testimonials-2.jpg')}}" style="vertical-align:middle;" width=220 >
                        </div>
                        <div class="col-md-4">
                           <div class="card-body">
                              <h5 class="card-title">Jenifer</h5>
                              <p class="card-text">Age: 25</p>
                              <p class="card-text">Location: City A</p>
                              <p class="card-text">Profession: Software Engineer</p>
                              <p class="card-text">Company: ABC Corp</p>
                              <div class="row gy-4 pt-3">
                                 <div class="col-md-3 text-md-end text-start">
                                    <label >Interest</label>
                                 </div>
                                 <div class="col-md-6">
                                    <button class="btn btn-danger">
                                    <i class="fas fa-comments"></i>Yes
                                    </button>
                                    <button class="btn btn-danger" >
                                    <i class="fas fa-comments "></i>No
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="profileContainer" class="row">
            <div class="col-md-12 mb-4   profile-card" data-gender="bride">
               <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                  <div class="card">
                     <div class="row">
                        <div class="col-md-5 " style="padding-left:20px;" onclick="view_person()"><span style="padding-left:2px;">NA00-M-03</span> | <span>Profile created for Sister</span>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-md-5 pad_space ">
                        </div>
                        <div class="col-md-6 pt-3 ms-2">
                           <img src="{{asset('assets/images/custom/testimonials-2.jpg')}}" style="vertical-align:middle;" width=220 >
                        </div>
                        <div class="col-md-4">
                           <div class="card-body">
                              <h5 class="card-title">Iniya</h5>
                              <p class="card-text">Age: 25</p>
                              <p class="card-text">Location: City A</p>
                              <p class="card-text">Profession: Software Engineer</p>
                              <p class="card-text">Company: ABC Corp</p>
                              <div class="row gy-4 pt-3">
                                 <div class="col-md-3 text-md-end text-start">
                                    <label >Interest</label>
                                 </div>
                                 <div class="col-md-6">
                                    <button class="btn btn-danger">
                                    <i class="fas fa-comments"></i>Yes
                                    </button>
                                    <button class="btn btn-danger" >
                                    <i class="fas fa-comments "></i>No
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="profileContainer" class="row">
            <div class="col-md-12 mb-4   profile-card" data-gender="bride">
               <div class="wrapper-max" style="border:3px solid #e5e5e5;">
                  <div class="card">
                     <div class="row">
                        <div class="col-md-5 " style="padding-left:20px;" onclick="view_person()"><span style="padding-left:2px;">NA00-M-04</span> | <span>Profile created for Daughter</span>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-md-5 pad_space ">
                        </div>
                        <div class="col-md-6 pt-3 ms-2">
                           <img src="{{asset('assets/images/custom/testimonials-2.jpg')}}" style="vertical-align:middle;" width=220 >
                        </div>
                        <div class="col-md-4">
                           <div class="card-body">
                              <h5 class="card-title">Merlin</h5>
                              <p class="card-text">Age: 25</p>
                              <p class="card-text">Location: City A</p>
                              <p class="card-text">Profession: Software Engineer</p>
                              <p class="card-text">Company: ABC Corp</p>
                              <div class="row gy-4 pt-3">
                                 <div class="col-md-3 text-md-end text-start">
                                    <label >Interest</label>
                                 </div>
                                 <div class="col-md-6">
                                    <button class="btn btn-danger">
                                    <i class="fas fa-comments"></i>Yes
                                    </button>
                                    <button class="btn btn-danger" >
                                    <i class="fas fa-comments "></i>No
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection