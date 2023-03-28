<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
    <div class="mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalCenter" title="Add User">
          <i class='bx bxs-user-plus' style='font-size: 30px'></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Create new user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formAuthentication" class="mb-3" action="{{ url('/auth/register-basic') }}"
                        method="POST" style="padding: 20px;">
                        @csrf {{--  Evitar ataques csrf --}}

                        <div class="row">
                          <div class="col-md-4 mb-3 d-flex justify-content-center align-items-center flex-column">
                            <div style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden; margin-bottom: 10px;">
                              <label for="photo" style="cursor: pointer;">
                                <img src="assets/img/avatars/5.png" style="width: 100%; height: 100%; object-fit: cover;" alt="Profile picture">
                              </label>
                              <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*" style="display: none;">
                            </div>
                            @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <select class="form-select text-center" id="exampleFormControlSelect1" aria-label="Default select example" style="width: 100%;">
                              <option selected disabled>Privileges</option>
                              <option value="1">Pentester</option>
                              <option value="2">Manager</option>
                              <option value="3">Admin</option>
                            </select>
                            </select>
                          </div>


                          <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="User's First Name" value="{{ old('firstname') }}" autofocus>
                                @error('firstname')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                                </div>
                              </div>

                              <div class="col-md-6 mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="User's Last Name" value="{{ old('lastname') }}" autofocus>
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                              </div>

                              <div class="col-md-6 mb-3">
                                <label for="sigla" class="form-label">Sigla</label>
                                <input type="text" class="form-control @error('sigla') is-invalid @enderror" id="sigla" name="sigla" placeholder="User's Sigla (3 letters)" value="{{ old('sigla') }}" autofocus>
                                @error('sigla')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                    @enderror
                                  </div>

                              <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder="User's Role" value="{{ old('role') }}" autofocus>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                    @enderror
                                  </div>

                              <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="User's Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                              </div>

                              <div class="col-md-6 mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                              </div>
                          </div>
                          <div class="col-md-6 mb-3 mt-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Sign up</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
