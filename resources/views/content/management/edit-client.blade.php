<!-- Vertically Centered Modal -->

        <!-- Button trigger modal -->
        <a href="#" class="btn p-0" data-bs-toggle="modal" data-bs-original-title="Edit client" data-bs-target="#modalCenter" title="Edit client profile" aria-describedby="tooltip674202">
          <i class='bx bx-edit' style="font-size: 30px"></i>
        </a>


        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit {{$client->name}}'s client profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formAuthentication" class="mb-3" action="{{ route('auth-edit-client') }}" method="POST" style="padding: 20px;" enctype="multipart/form-data">
                      @csrf {{-- Evitar ataques csrf --}}
                      <input type="hidden" name="client_id" value="{{ $client->id }}"> {{-- Send user ID --}}
                      <div class="row justify-content-center">
                        <div class="col-md-12">
                          <div class="row justify-content-center">
                            <div class="col-md-4 mb-3">
                              <div class="d-flex justify-content-center align-items-center">
                                <label for="picture" style="cursor: pointer;">
                                  <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                    <img src="{{ asset($client->logo) }}" alt="Profile picture" id="picturePreview" class="w-100 h-100">
                                  </div>
                                </label>
                              </div>
                              <input type="file" class="form-control @error('picture') is-invalid @enderror mt-2" id="picture" name="picture" accept="image/*" >
                              @error('picture')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="name" class="form-label">Company name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder=" First Name" value="{{ $client->name }}" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                                </div>

                              <div class="col-md-9 mb-3">
                                <label for="tin" class="form-label">TIN</label>
                                <input type="text" class="form-control @error('tin') is-invalid @enderror" id="tin" name="tin" placeholder="tin (9 numbers)" value="{{ $client->tin }}" autofocus>
                                @error('tin')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                    @enderror
                                  </div>

                              <div class="col-md-9 mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder=" Code" value="{{ $client->code }}" autofocus readonly disabled>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                    @enderror
                                  </div>

                              <div class="col-md-9 mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="phone" value="{{$client->phone}}" autofocus>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                    @enderror
                                  </div>

                              <div class="col-md-9 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder=" Email" value="{{ $client->address }}">
                                @error('address')
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
