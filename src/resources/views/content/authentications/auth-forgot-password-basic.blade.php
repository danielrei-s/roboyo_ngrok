@extends('layouts/blankLayout')

@section('title', 'Forgot Password')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{secure_asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Forgot Password -->
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
          <h4 class="mb-2">Forgot Password? 🔒</h4>
          <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
          <!-- form -->
          <form id="formAuthentication" class="mb-3" action="{{ route('password.email')}}" method="POST">
            @csrf
            @if (session('status'))
                <div class="alert alert-success"> {{session('status')}}
                </div>
            @endif
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
              @error('email')
                 <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
               @enderror
            </div>
            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
          </form>
          <!-- /form -->
          <div class="text-center">
            <a href="{{secure_url('auth/login-basic')}}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection
