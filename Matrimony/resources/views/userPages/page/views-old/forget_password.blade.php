@extends('layout2.home')

@section('title')
Forget password
@endsection

@section('content')
<main class="main pt-5">
   <section id="contactus" class="section">
   <div class="d-flex justify-content-center align-items-center vh-50">
         <div class="col-lg-5 m-15px-tb">
               <div class="card shadow-sm">
                  <div class="card-body ">
                     <form>
                        <h5 class="text-center">OTP will be sent to your registered email id</h5>
                        <div class="mb-3">
                           <label for="email" class="form-label">Email address</label>
                           <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <a href="#" type="submit" class="btn btn-danger w-40 ">send code</a> 
                     </form>
                  </div>
               </div>
         </div>
    </div>
    </section>
   <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>   
</main>
@endsection
