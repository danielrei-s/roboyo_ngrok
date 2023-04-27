
<!-- Toggle Between Modals -->
<div class="col-lg-4 col-md-6">
  <div class="mt-3">
    <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalToggle" title="Add Client">
      <i class='bx bxs-folder-plus' style='font-size: 30px'></i>
    </button>

    <!-- Modal 1-->
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalToggleLabel">Add new client</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formAuthentication" class="mb-3" action="{{ route('auth-register-client') }}" method="POST" style="padding: 20px;" enctype="multipart/form-data">
              @csrf {{-- Evitar ataques csrf --}}
                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <div class="d-flex justify-content-center align-items-center">
                            <label for="picture" style="cursor: pointer;">
                              <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                <img src="assets/img/clients/default.png" alt="Profile picture" id="picturePreview" class="w-100 h-100">
                              </div>
                            </label>
                          </div>
                          <input type="file" class="form-control @error('picture') is-invalid @enderror mt-2" id="picture" name="picture" accept="image/*">
                            @error('picture')
                          <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>

                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-6 mb-4 mt-3">
                                <label for="name" class="form-label">Company Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}" autofocus>
                                  @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                  @enderror
                            </div>

                            <div class="col-md-6 mb-4 mt-3">
                              <label for="tin" class="form-label">TIN</label>
                              <input type="text" class="form-control @error('tin') is-invalid @enderror" id="tin" name="tin" placeholder="Code (9 numbers)" value="{{ old('tin') }}" autofocus>
                                @error('tin')
                                  <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                              <label for="address" class="form-label">Address</label>
                              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder=" Address" value="{{ old('address') }}" autofocus>
                              @error('address')
                                  <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                                  @enderror
                                </div>

                            <div class="col-md-6 mb-4">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder=" Phone" value="{{ old('phone') }}">
                              @error('phone')
                              <div class="invalid-feedback">{{ $message }}</div> {{-- feedback ao user sobre erros de input --}}
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="justify-content-start">
                      <button class="btn btn-success float-end" id="open-modal-btn" data-bs-target="#modalToggle2"
                       data-bs-toggle="modal" data-bs-dismiss="modal">Add contact</button>
                    </div>
                  </div>
                  <div class="modal-footer">

                    <div class="d-flex justify-content-end">
                      <button type="button" class="btn btn-outline-secondary btn-md me-2" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary">Sign up</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal 2-->
              <div class="modal fade" id="modalToggle2" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalToggleLabel2">Add contact to new client</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5 class="text-center mb-4"> Add Contact</h5>
                  <div class="mb-2 mt-2">
                    <label for="contact_name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('contact_name') is-invalid @enderror" id="contact_name" name="contact_name" placeholder="Name" value="{{old('contact_name')}}">
                    @error('contact_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-2">
                    <label for="contact_email" class="form-label" >Email</label>
                    <input type="text" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" placeholder="Email" value="{{old('contact_email')}}">
                    @error('contact_email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-2">
                    <label for="contact_title" class="form-label" >Job Title</label>
                    <input type="text" class="form-control @error('contact_title') is-invalid @enderror" id="contact_title" name="contact_title" placeholder="Job title" value="{{old('contact_title')}}">
                    @error('contact_title')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-2">
                    <label for="contact_phone" class="form-label" >Phone number</label>
                    <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" placeholder="Phone" value="{{old('contact_phone')}}">
                    @error('contact_phone')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#modalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Save & back</button>
          </div>
        </div>
      </div>
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

  <!-- Script to prevent form submission when split into modals-->
  <script>
    const openModalBtn = document.getElementById('open-modal-btn');
    const secondModal = document.getElementById('modalToggle2');

    openModalBtn.addEventListener('click', function(event) {
      event.preventDefault(); // prevent form submission

      // Open the second modal
      secondModal.style.display = 'block';
    });

  </script>
