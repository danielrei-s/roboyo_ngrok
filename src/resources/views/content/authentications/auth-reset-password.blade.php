@extends('layouts/blankLayout')

@section('title', 'Force Password Reset')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{secure_asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
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
          <h4 class="mb-2 text-center">PenTest Reporting Tool</h4>
          <p class="mb-4 text-center">Password change for <span class="fw-bold">{{auth()->user()->email}}</span>.</p>
          <!-- Form -->
          <form id="formpasswordReset" method="POST" action="{{ route('force-password-reset') }}">
            @csrf
              <div class="row">
                  <div class="mb-3 col-12 mx-auto">
                      <label for="currentPassword" class="form-label">Current password:</label>
                      <input class="form-control" type="password" id="currentPassword" name="currentPassword" required>
                      @error('currentPassword')
                        <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
                      @enderror
                  </div>
                  <div class="mb-3 col-12 mx-auto">
                      <label for="newPassword" class="form-label">New password:</label>
                      <input class="form-control" type="password" id="newPassword" name="newPassword" required>
                      @error('newPassword')
                        <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
                      @enderror
                  </div>
                  <div class="mb-3 col-12 mx-auto">
                      <label for="newPassword_confirmation" class="form-label">Confirm new password:</label>
                      <input class="form-control" type="password" id="newPassword_confirmation" name="newPassword_confirmation" required> {{-- this name format is required by LAravel --}}
                  </div>
              </div>
              <div class="col-6 mx-auto">
                  <button type="submit" class="btn btn-primary d-grid w-100">Update password</button>
              </div>

          </form>
          <div class="text-center mt-3">
            <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"> ⬅ Back to Login page
            </a>
          </div>


          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
  @include('layouts/sections/footer/footer')
</div>
</div>
@endsection
