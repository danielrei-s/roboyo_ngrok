<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
    <div class="mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalCenter" title="Add Client">
          <i class='bx bxs-briefcase-alt-2' style='font-size: 30px'></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" address="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Create new client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
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




                                <div class="table-responsive text-nowrap">
                                  <table class="table table-dark">
                                    <thead>
                                <tr>
                                  <th class="sortable" data-sort-by="name">
                                    Name
                                    <span class="arrow-up"></span>
                                    <span class="arrow-down visible"></span>
                                  </th>
                                  <th class="sortable" data-sort-by="title">
                                    Title
                                    <span class="arrow-up"></span>
                                    <span class="arrow-down visible"></span>
                                  </th>
                                  <th class="sortable" data-sort-by="email">
                                    Email
                                    <span class="arrow-up"></span>
                                    <span class="arrow-down visible"></span>
                                  </th>
                                  <th class="sortable" data-sort-by="phone">
                                    Phone
                                    <span class="arrow-up"></span>
                                    <span class="arrow-down visible"></span>
                                  </th>
                                </tr>
                              </thead>
                                    <tbody class="table-border-bottom-0">

                                    </tbody>
                                  </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">

                                  </div>
                              </div>


                              <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary btn-md me-3" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary">Sign up</button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
