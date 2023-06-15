<!-- Vertically Centered Modal -->

        <!-- Button trigger modal -->
        <a href="#" class="btn btn-secondary btn-action" data-bs-toggle="modal" data-bs-original-title="Edit user" data-bs-target="#modalCenter" title="Edit user profile" aria-describedby="tooltip674202">
          <i class='bx bx-edit'> Edit</i>
        </a>


        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="width: 35rem;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit {{$user->firstName}} {{$user->lastName}}'s profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formAuthentication" class="mb-3" action="{{ route('auth-edit-basic') }}" method="POST" style="padding: 15px;" enctype="multipart/form-data">
                      @csrf {{-- Evitar ataques csrf --}}
                      <input type="hidden" name="user_id" value="{{ $user->id }}"> {{-- Send user ID --}}
                      <div class="row justify-content-center">
                        <div class="col-md-12">
                          <div class="row justify-content-center">
                            <div class="col-md-4 mb-3">
                              <div class="d-flex justify-content-center align-items-center">
                                <label for="picture" style="cursor: pointer;">
                                  <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                    <img src="{{ secure_asset($user->picture) }}" alt="Profile picture" id="picturePreview" class="w-100 h-100">
                                  </div>
                                </label>
                              </div>
                              <input type="file" class="form-control @error('picture') is-invalid @enderror mt-2" id="picture" name="picture" accept="image/*" >
                              @error('picture')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                              <div class="text-center mt-1">
                              <label for="admin" class="mt-2 mb-1">Privileges</label>
                              </div>
                              <select class="form-select text-center mt-2 mb-1" name="admin" id="admin" aria-label="Select privilege" style="width: 100%;">
                                <option value="0" @if($user->admin == 0) selected @endif>Pentester</option>
                                <option value="1" @if($user->admin == 1) selected @endif>Manager</option>
                                <option value="2" @if($user->admin == 2) selected @endif>Admin</option>
                            </select>

                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder=" First Name" value="{{ $user->firstName }}" autofocus>
                                @error('firstname')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                                </div>

                              <div class="col-md-9 mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder=" Last Name" value="{{ $user->lastName }}" autofocus>
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                              </div>

                              <div class="col-md-9 mb-3">
                                <label for="sigla" class="form-label">Sigla</label>
                                <input type="text" class="form-control @error('sigla') is-invalid @enderror" id="sigla" name="sigla" placeholder="Sigla (3 letters)" value="{{ $user->sigla }}" autofocus>
                                @error('sigla')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                    @enderror
                                  </div>

                              <div class="col-md-9 mb-3">
                                <label for="role" class="form-label">Job Title</label>
                                <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder="Job Title" value="{{ $user->role }}" autofocus>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                    @enderror
                                  </div>

                              <div class="col-md-9 mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="phone" value="{{$user->phone}}" autofocus>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                    @enderror
                                  </div>

                              <div class="col-md-9 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder=" Email" value="{{ $user->email }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                              </div>
                              <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary btn-md me-3" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary">Update</button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>

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

