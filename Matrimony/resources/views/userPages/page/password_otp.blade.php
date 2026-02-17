@extends('layout2.home')

@section('title')
Password otp
@endsection

@section('content')
<main class="main">
<div class="container  pt-5">
   <div class="d-flex justify-content-center align-items-center vh-50">
      <div class="bg-light border rounded py-sm-5 px-sm-5">
         <h3 class="text-center pt-3"><strong>Verify Your Email Id</h3>
         <h5 class="text-muted text-center mb-4">You will receive a 6-digit confirmation code via mail to<span><strong> example123@gmail.com</span></h5>
         <form id="code" action="" method="post">
            <div class="row justify-content-center gy-4 pt-2 ">
               <div class="col-md-4">
                  <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter code">
               </div>
               <div class="col-md-1 d-flex justify-content-center">
                  <a href="#"type="button" class="btn btn-danger"> Verify</a> 
               </div>
               <h6 class="text-center pt-2">
               Didn't get the code? <a href="#"><u>Resend it</u></a>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection