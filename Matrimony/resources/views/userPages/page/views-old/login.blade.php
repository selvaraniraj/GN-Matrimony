@extends('layout2.home')

@section('title')
Login
@endsection

@section('content')
<main class="main">
    <section id="contactus" class="section ">
        <div class="container divpadding pt-4">
            <div class="row">
                <div class="col-lg-3 m-15px-tb">&nbsp;</div>
                <div class="col-lg-6 m-15px-tb" class="col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="text-center mb-4">Login</h4>
                            {!! Form::open(['url' => route('app.v2.loginForm'), 'method' => 'post', 'class' => '', 'id' => 'userLoginPageForm']) !!}
                                {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Enter your password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                    <button type="submit" class="btn btn-danger w-100 "> Login</button>
                                {{-- <div class="text-center mt-3">
                                    <a href="#" class="text-muted"> Forgot password?</a>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="text-muted">Don't have an account? <a href="#">Register</a></span>
                                </div> --}}
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
@endsection
