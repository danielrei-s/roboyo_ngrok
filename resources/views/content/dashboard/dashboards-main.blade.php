@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style2 mb-2">
    <li class="breadcrumb-item active">
      <a href="{{ url('/') }}">Dashboard</a>
    </li>
  </ol>
</nav>

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
                          <div class="card accordion-item active">
                              <h2 class="accordion-header" id="headingOne">
                                  <button type="button" class="accordion-button"
                                      data-bs-toggle="collapse" data-bs-target="#accordionOne"
                                      aria-expanded="true" aria-controls="accordionOne">
                                      Edit Profile
                                  </button>
                              </h2>

                              <div id="accordionOne" class="accordion-collapse collapse show"
                                 data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <!-- Account -->
                                    <h5 class="card-header">Profile Details</h5>
                                    <div class="card-body">
                                      <form id="formAuthentication" class="mb-3" action="{{ route('auth-edit-basic') }}" method="POST" style="padding: 20px;" enctype="multipart/form-data">
                                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
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

                                          <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 10Mb</p>
                                        </div>
                                      </div>
                                    </div>
                                    <hr class="my-0">
                                      <!-- Form -->
                                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                                        @csrf
                                        <div class="row">
                                          <div class="mb-3 col-md-6">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder=" First Name" value="{{ $user->firstName }}" autofocus>
                                            @error('firstname')
                                              <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                            @enderror
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder=" Last Name" value="{{ $user->lastName }}" autofocus>
                                            @error('lastname')
                                                <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                            @enderror
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="sigla" class="form-label">Sigla</label>
                                            <input type="text" class="form-control @error('sigla') is-invalid @enderror" id="sigla" name="sigla" placeholder="Sigla (3 letters)" value="{{ $user->sigla }}" autofocus>
                                            @error('sigla')
                                              <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                            @enderror
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="role" class="form-label">Role</label>
                                            <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder=" Role" value="{{ $user->role }}" autofocus>
                                            @error('role')
                                              <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                            @enderror
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="contact" class="form-label">Phone number</label>
                                            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="contact" value="{{$user->contact}}" autofocus>
                                            @error('contact')
                                                <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                                @enderror
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
                            <!-- Accordion Item 2 -->
                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button type="button" class="accordion-button collapsed"
                                  data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                  aria-expanded="false" aria-controls="accordionTwo">
                                  Change Password
                                </button>
                              </h2>
                              <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card-body">
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
              <form id="delete-user-{{ auth()->user()->id }}" action="{{ route('user-management.destroy', auth()->user()->id) }}" method="POST" onsubmit="return validateForm()">
                @csrf
                @method('DELETE')
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
<!-- Script to make sure user checked box to delete account, if not -> popup -->
<script>
  function validateForm() {
      var checkBox = document.getElementById("accountActivation");
      if (checkBox.checked == false) {
          alert("Please confirm your account deactivation by checking the checkbox.");
          return false;
      }
  }
</script>
<script>  //show a preview of the photo about to be uploaded
  const inputPicture = document.querySelector('#picture');
  const picturePreview = document.querySelector('#picturePreview');

  inputPicture.addEventListener('change', () => {
      const file = inputPicture.files[0];
      const reader = new FileReader();

      reader.addEventListener('load', () => {
          picturePreview.setAttribute('src', reader.result);
      });

      if (file) {
          reader.readAsDataURL(file);
      }
  });
</script>
@endsection
