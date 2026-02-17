@extends('layout2.home')

@section('title')
Login
@endsection

@section('content')
<main class="main">
    <section id="contactus" class="section ">
        <div class="container divpadding py-5">
            <div class="row">
                <div class="col-lg-3 m-15px-tb">&nbsp;</div>
                <div class="col-lg-6 m-15px-tb" class="col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="text-center mb-4">Login</h4>
                            {!! Form::open(['url' => route('app.v2.loginForm'), 'method' => 'post', 'class' => '', 'id' => 'userLoginPageForm']) !!}
                                {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address/Mobile Number</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                             <div class="mb-3 position-relative">
    <label for="password" class="form-label">Password</label>

    <input
        name="password"
        type="password"
        class="form-control pe-5"
        id="password"
        placeholder="Enter your password"
    >

    <!-- Eye Icon -->
    <span
        class="position-absolute top-50 end-0 translate-middle-y me-3"
        style="cursor: pointer;"
        onclick="togglePassword()"
    >
        <i class="bi bi-eye" id="togglePasswordIcon"></i>
    </span>

    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

                                    <button type="submit" class="btn btn-danger w-100 "> Login</button>
                                  <!-- <div class="text-center mt-3">
                                    <a href="#" class="text-muted"> Forgot password?</a>
                                </div> -->
                                <div class="text-center mt-3">
                                    <span class="text-muted">Don't have an account? <a href="{{ route('app.v2.home_page') }}">Register Now</a></span>
                                </div> 
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</main>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const icon = document.getElementById("togglePasswordIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
</script>



@endsection
