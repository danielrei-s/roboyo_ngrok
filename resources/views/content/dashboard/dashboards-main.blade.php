@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"> Dashboard /</span> Profile-Information
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-row flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
        Account</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-account') }}"><i
                    class="bx bx-bell me-1"></i>Others</a></li>
    </ul>
      <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <img src="{{ asset(auth()->user()->picture) }}"
                      alt="{{ auth()->user()->firstName }} {{ auth()->user()->lastName }}" class="d-block rounded"
                      height="120" width="120" id="uploadedAvatar" />
                  <div class="button-wrapper">
                      <p class="far fa-users-class fa-lg fa-fw" style="margin-right: 120px;">
                          {{ auth()->user()->sigla }} | {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}
                      </p>
                      <p>{{ auth()->user()->email }}</p>
                      <p>+351 {{ auth()->user()->contact }}</p>
                  </div>
                  <div style="border-left: 2px dashed #ccc; padding-left: 120px;">
                      <!-- Doted line a seprar -->
                      <div class="button-wrapper">
                          <div class="d-flex align-items-start align-items-sm-center justify-content-end gap-4">
                              <div class="d-flex flex-column align-items-start">
                                  <p class="fal fa-envelope-open-text fa-sm fa-fw">System Role </p>
                                  <p class="text-muted">{{ $role = app('App\Role') }}</p>
                              </div>
                              <img src="{{ asset('assets/img/roles/' . $role . '.png') }}" alt="role-avatar"
                                  class="d-block rounded" height="100" width="100" id="roleAvatar"
                                  style="margin-right: 75px;" />
                          </div>
                      </div>
                  </div>
              </div>
              <hr class="my-1">
              <div class="card-body">
                <!-- Accordion -->
                <div class="row">
                    <div class="col-md mb-4 mb-md-0">
                        <div class="accordion mt-3" id="accordionExample">
                          <!-- Accordion Item 1 -->
                          <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                  <button type="button" class="accordion-button collapsed"
                                      data-bs-toggle="collapse" data-bs-target="#accordionOne"
                                      aria-expanded="false" aria-controls="accordionOne">
                                      Change Password
                                  </button>
                              </h2>
                              <div id="accordionOne" class="accordion-collapse collapsed"
                                  aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <!-- Form -->
                                      <form id="formAccountSettings" method="POST" action="{{ route('change-password') }}">
                                        @csrf
                                          <div class="row">
                                              <div class="mb-3 col-8 mx-auto">
                                                  <label for="currentPassword" class="form-label">Current
                                                      password:</label>
                                                  <input class="form-control" type="password" id="currentPassword"
                                                      name="currentPassword" />
                                                  @error('currentPassword')
                                                    <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
                                                  @enderror
                                              </div>
                                              <div class="mb-3 col-8 mx-auto">
                                                  <label for="newPassword" class="form-label">New
                                                      password:</label>
                                                  <input class="form-control" type="password" id="newPassword"
                                                      name="newPassword" />
                                                  @error('newPassword')
                                                    <p style="color:red">{{ $message }}</p>   {{--feedback ao user sobre erros de input --}}
                                                  @enderror
                                              </div>
                                              <div class="mb-3 col-8 mx-auto">
                                                  <label for="confirmPassword" class="form-label">Confirm new
                                                      password:</label>
                                                  <input class="form-control" type="password" id="confirmPassword"
                                                      name="newPassword_confirmation" />
                                              </div>
                                          </div>
                                          <div class="col-3 mx-auto">
                                              <button type="submit" class="btn btn-primary me-2">Update</button>
                                              <button type="reset"
                                                  class="btn btn-outline-secondary">Cancel</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                            <!-- Accordion Item 2 -->
                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button type="button" class="accordion-button collapsed"
                                  data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                  aria-expanded="false" aria-controls="accordionTwo">
                                  Edit Profile
                                </button>
                              </h2>
                              <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ asset(auth()->user()->picture) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                        <div class="button-wrapper">
                                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                          </label>
                                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                          </button>

                                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                      </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body">
                                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                                        <div class="row">
                                          <div class="mb-3 col-md-6">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input class="form-control" type="text" id="firstName" name="firstName" value="{{auth()->user()->firstName}}" autofocus />
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input class="form-control" type="text" name="lastName" id="lastName" value="{{auth()->user()->lastName}}" />
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input class="form-control" type="text" id="email" name="email" value="{{auth()->user()->email}}" placeholder="john.doe@example.com" />
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="organization" class="form-label">Role</label>
                                            <input type="text" class="form-control" id="organization" name="organization" value="{{auth()->user()->role}}" />
                                          </div>
                                        </div>
                                        <div class="mt-2">
                                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                        </div>
                                      </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
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
                      <input class="form-check-input" type="checkbox" name="accountActivation"
                          id="accountActivation" />
                      <label class="form-check-label" for="accountActivation">I confirm my account
                          deactivation</label>
                  </div>
                  <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
