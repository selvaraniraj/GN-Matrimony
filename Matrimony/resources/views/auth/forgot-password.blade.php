@extends('layout2.auth')

@section('title') Forgot Password @endsection

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
                        <span class="h1 fw-bold mb-0">Forgot Password</span>
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
                    {!! Form::open(['url' => route('reset.resetlink'), 'method' => 'post', 'class' => 'card card--space card-md forgotEmailFormVal', 'autocomplete' => 'off']) !!}
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
                        <div class="text-center">
                            {!! Form::submit('Submit', ['class' => 'btn btn-dark btn-lg btn-block']) !!}
                        </div>
                        <div class="text-center">
                            <!-- <a class="button button--link button--transparent" href="/pages/reset-password.html" type="button" title="New User Registration">New User Registration</a> -->
                        </div>
                        </div>
                    {!! Form::close() !!}
                    <br>

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

