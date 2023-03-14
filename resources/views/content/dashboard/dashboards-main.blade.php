@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light"> Dashboard /</span> Profile-Information
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-account')}}"><i class="bx bx-bell me-1"></i>Settings</a></li>
  </ul>
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4" >
            <img src="{{ asset('assets/' . auth()->user()->picture) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
            <div class="button-wrapper">
              <p class="far fa-users-class fa-lg fa-fw" style="margin-right: 90px;">{{auth()->user()->sigla}} | {{auth()->user()->firstName}} {{auth()->user()->lastName}} </p>
              <p>{{auth()->user()->email}}</p>
              <p>+351 {{auth()->user()->contact}}</p>
            </div>

          <div style="border-left: 2px dashed #ccc; padding-left: 90px;"> <!-- Doted line a seprar -->
        
            <div class="button-wrapper">
              <div class="d-flex align-items-start align-items-sm-center justify-content-end gap-4">
                <div class="d-flex flex-column align-items-start">
                  <p class="fal fa-envelope-open-text fa-sm fa-fw" >System Role </p>
                  <p class="text-muted">{{$role = app('App\Role')}}</p>
                </div>
                <img src="{{ asset('assets/img/roles/' . $role . '.png') }}" alt="role-avatar" class="d-block rounded" height="100" width="100" id="roleAvatar" style="margin-right: 75px;" />
              </div>  
            </div>

          </div>

          <div style="border-left: 2px dashed #ccc; padding-left: 45px;"> <!-- Doted line a seprar -->
            <img src="{{ asset('assets/img/icons/unicons/chart.png')}}" alt="tbd" class="d-block rounded" height="100" width="100" id="tbd" />          
          </div>
        </div>
        <hr class="my-1">
        <div class="card-body">
          <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
              <div class="mb-3 col-8 mx-auto">
                <label for="currentPassword" class="form-label">Current password:</label>
                <input class="form-control" type="password" id="currentPassword" name="currentPassword" />
              </div>
              <div class="mb-3 col-8 mx-auto">
                <label for="newPassword" class="form-label">New password:</label>
                <input class="form-control" type="password" id="newPassword" name="newPassword" />
              </div>
              <div class="mb-3 col-8 mx-auto">
                <label for="confirmPassword" class="form-label">Confirm password:</label>
                <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" />
              </div>
            </div>
            <div class="col-3 mx-auto">
              <button type="submit" class="btn btn-primary me-2">Update</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </form>
          
        </div>
        <!-- /Account -->
      </div>
    <div class="card">
      <h5 class="card-header">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
