@extends('layouts/blankLayout')

@section('title', 'Register User')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{secure_asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{secure_url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img src="{{secure_asset('assets/img/icons/brands/roboyo_R_12.jpg')}}">
              </span>
              <span class="app-brand-text demo text-body fw-bolder ">Roboyo</span>
            </a>
          </div>
          <!-- /Logo -->

          <!-- Form inputs -->
          <h4 class="mb-2">Register here!</h4>
          <p class="mb-4">Exclusive use of cybersecurity team at Roboyo</p>

          <form id="formAuthentication" class="mb-3" action="{{secure_url('/auth/register-basic')}}" method="POST">
            @csrf {{--  Evitar ataques csrf --}}

            <div class="mb-3">
              <label for="username" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname"
               placeholder="Enter your First Name" value="{{ old('firstname')}}" autofocus>
               @error('firstname')
                 <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
               @enderror
            </div>

            <div class="mb-3">
              <label for="username" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" ~
              placeholder="Enter your Last Name" value="{{ old('lastname')}}" autofocus>
              @error('lastname')
                 <p style="color:red">{{ $message }}</p>  {{--feedback ao user sobre erros de input --}}
               @enderror
            </div>

            <div class="mb-3">
              <label for="username" class="form-label">Sigla</label>
              <input type="text" class="form-control" id="sigla" name="sigla"
               placeholder="Enter your Sigla (3 letters)" value="{{ old('sigla')}}" autofocus>
               @error('sigla')
                 <p style="color:red">{{ $message }}</p> {{--feedback ao user sobre erros de input --}}
               @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email"
              placeholder="Enter your email" value="{{ old('email')}}">
              @error('email')
                 <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
              @enderror
            </div>

            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              @error('password')
               <p style="color:red">{{ $message }}</p> {{--feedback ao user sobre erros de input --}}
             @enderror
            </div>

            <button class="btn btn-primary d-grid w-100 ">
              Sign up
            </button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{secure_url('auth/login-basic')}}">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>
@endsection
