@extends('layouts/blankLayout')

@section('title', 'Change Password')

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
          <h4 class="mb-2">Change Password here!</h4>
          <p class="mb-4">Enter you new password in the fields below</p>
          <!-- form   -->

          <form id="formAuthentication" class="mb-3" action="{{route('password.update')}}" method="POST">
            @csrf
            {{-- @if (session('status'))
                <div class="alert alert-success"> {{session('status')}}
                </div>
            @endif --}}
            <input type="hidden" name="token" value="{{$token}}">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
              @error('email')
                 <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
               @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="">
              @error('password')
                 <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
               @enderror
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="">
              @error('password_confirmation')
                 <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
               @enderror
            </div>

            <button class="btn btn-primary d-grid w-100">Confirm New Password</button>
          </form>
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
