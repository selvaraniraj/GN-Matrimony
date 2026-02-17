@extends('layout2.auth')

@section('title') Login @endsection

@section('content')
<section class="" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{ asset('assets/images/auth_banner.webp') }}"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">

                <div class="card-body p-4 p-lg-5 text-black">
                    <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">Login Page</span>
                      </div>
                      <br>

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible loginErrorMessageMain" role="alert" style="text-align: center;">
                            <div>
                            <div class="alert-title" style="color:rgb(177, 36, 36);">
                                @if(is_array($message)) @foreach ($message as $m) {{ $m }} @endforeach
                                @else {{ $message }} @endif
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible loginSuccessMessageMain" role="alert" style="text-align: center;">
                            <div>
                            <div class="alert-title" style="color:rgb(38, 122, 27);">
                                @if(is_array($message)) @foreach ($message as $m) {{ $m }} @endforeach
                                @else {{ $message }} @endif
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    @endif
                    {!! Form::open(['url' => route('login'), 'method' => 'post', 'class' => '', 'autocomplete' => 'off', 'id' => 'loginForm']) !!}
                        {{csrf_field()}}
                        <div class="formWrapper__formWrap">
                        <div class="form-group focused">
                            {!! Form::label('email', 'E-Mail/UserName', ['class' => 'form-label']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control form-control-lg emailInputForm','id' => 'dealer', 'autocomplete' => 'off', 'autofocus' , 'maxlength' =>80]) !!}
                            @if ($errors->has('email'))
                                <div class="text-danger text-danger--space login-error-message-email">
                                    <p>{{ $errors->first('email') }}</p>
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="form-group focused">
                            {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control form-control-lg form-control--password passwordInputForm', 'id'=>'loginPassword', 'autocomplete' => 'off','maxlength' =>32]) !!}
                            @if ($errors->has('password'))
                                <div class="text-danger text-danger--space login-error-message-password">
                                    <p>{{ $errors->first('password') }}</p>
                                </div>
                            @endif
                        </div>
                        <br>


                        <div class="d-flex justify-content-between align-items-center formWrapper__checkRow">
                            <div class="form-group type-checkbox mb-0">
                            <input class="checkbox" name="remember" id="submitCheck1" type="checkbox">
                            <label for="submitCheck1">Remember password selvarani</label>
                            </div>
                            <a class="button button--link button--transparent" href="{{ route('forgotPassword') }}" type="button" title="Forgot Password?">Forgot Password?</a>
                        </div>
                        <br>
                        <div class="text-center">
                            {!! Form::submit('Login', ['class' => 'btn btn-dark btn-lg btn-block']) !!}
                        </div>
                        <div class="text-center">
                            <!-- <a class="button button--link button--transparent" href="/pages/reset-password.html" type="button" title="New User Registration">New User Registration</a> -->
                        </div>
                        </div>
                    {!! Form::close() !!}
                    <br>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{route('register')}}"
                      style="color: #393f81;">Register here</a></p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  <style>
    .text-danger{
      color:red
    }
    .loginCaptchaImg img {
          pointer-events: none;
          user-select: none;
      }
  </style>

  @section('api_scripts')
      <script>
          $(document).ready(function() {
            //   // $('.captchaImage .form-group').removeClass('focused');
            //   $('.captchaInputForm').attr('value', '');
            //   $('.captchaInputForm').on('input focus', function() {
            //       $(".captcha-error-message").hide();
            //   });
            //   $('.passwordInputForm').on('input focus', function() {
            //       $(".login-error-message-password").hide();
            //   });
            //   $('.emailInputForm').on('input focus', function() {
            //       $(".login-error-message-email").hide();
            //   });
            //    setTimeout(function() {
            //         $(".loginErrorMessageMain").css('display', 'none');
            //         $(".loginSuccessMessageMain").css('display', 'none');
            //     }, 5000);
          });
      </script>

  @endsection

