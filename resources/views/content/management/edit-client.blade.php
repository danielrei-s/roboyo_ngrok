<!-- Vertically Centered Modal -->


      <form id="formAuthentication" class="mb-3" action="{{ route('auth-edit-client') }}" method="POST" style="padding: 30px;"
          enctype="multipart/form-data">
          @csrf {{-- Evitar ataques csrf --}}
          <input type="hidden" name="client_id" value="{{ $client->id }}"> {{-- Send user ID --}}
          <div class="row">
              <div class="col-md-4 mb-3">
                  <div class="d-flex justify-content-center align-items-center">
                      <label for="picture" style="cursor: pointer;">
                          <div class="rounded-circle overflow-hidden" style="width: 190px; height: 190px;">
                              <img src="{{ secure_asset($client->logo) }}" alt="Profile picture" id="picturePreview"
                                  class="w-100 h-100">
                          </div>
                      </label>
                  </div>
                  <input type="file" class="form-control @error('picture') is-invalid @enderror mt-2" id="picture"
                      name="picture" accept="image/*">
                  @error('picture')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <div class="col-md-7 mb-3">
                  <div class="row">
                      <div class="col-md-7 mb-3">
                          <label for="name" class="form-label">Company name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                              name="name" placeholder=" First Name" value="{{ $client->name }}" autofocus>
                          @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="col-md-5 mb-3">
                          <label for="tin" class="form-label">TIN</label>
                          <input type="text" class="form-control @error('tin') is-invalid @enderror" id="tin"
                              name="tin" placeholder="tin (9 numbers)" value="{{ $client->tin }}" autofocus>
                          @error('tin')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="col-md-7 mb-3">
                          <label for="phone" class="form-label">Phone number</label>
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                              name="phone" placeholder="phone" value="{{ $client->phone }}" autofocus>
                          @error('phone')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="col-md-5 mb-3">
                          <label for="code" class="form-label">Code</label>
                          <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                              name="code" placeholder=" Code" value="{{ $client->code }}" autofocus>
                          @error('code')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="col-md-7 mb-3">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                              name="address" placeholder=" Email" value="{{ $client->address }}">
                          @error('address')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="col-md-5 mt-4 d-flex justify-content-center align-items-start">
                          <button class="btn btn-primary btn-md">Update</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
    {{-- </div>
  </div>
</div> --}}

{{-- <hr class="my-1">

      <div class="card-body">
        <div class="row">
          <div class="col-md-10">
            {{-- <div id="show-contact-table"> --}}
{{-- @component('content.live-table', ['data' => $contacts])

                @endcomponent --}}

{{-- @component('content.management.show-contact-table', ['contacts' => $contacts, 'client' => $client])
                @endcomponent

            </div> --}}
{{-- </div>
          <div class="col-md-2">
            <div id="add-contact-form" class="d-flex justify-content-end"> --}}
<!-- Show the "Add Contact" component if $contact is not set -->
{{-- @component('content.management.add-contact-form', ['client' => $client])
                  @endcomponent
            </div>
          </div>
        </div>
      </div> --}}




<script>
    //show a preview of the photo about to be uploaded
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

{{-- <script>
  var editVisible = false;

  function toggleEdit(contactId) {
    if (editVisible) {
      // hide edit-contact-form
      document.getElementById('edit-contact-form').style.display = 'none';
      // show add-contact-form
      document.getElementById('add-contact-form').style.display = 'block';
      editVisible = false;
    } else {
      // hide add-contact-form
      document.getElementById('add-contact-form').style.display = 'none';
      // show edit-contact-form
      document.getElementById('edit-contact-form').style.display = 'block';
      editVisible = true;
    }


  }
</script> --}}


{{-- <script>
  $(document).ready(function() {
    $('a[data-bs-target="#modalEditContact"]').click(function() {
      setTimeout(function() {
        $('#modalClientEdit').modal('hide');
        $('#modalEditContact').modal('show');
      }, 50); // Delay the modal change by 1 second (1000 milliseconds)
    });
  });
</script> --}}
