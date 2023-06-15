


  <form id="formAuthentication" action="{{ route('auth-register-contact') }}" method="POST">
    @csrf {{-- Evitar ataques csrf --}}
    <input type="hidden" name="client_id" value="{{ $client->id }}">
        <h6 class="text-center mb-4" style="font-size: .75rem; letter-spacing: 1px; color: #566a7f; margin-top: 3rem "> ADD CONTACT</h6>
      <div class="mb-2 mt-2 col-md-10 mx-auto">
          <label for="contact_name" class="form-label" style="font-size: 10px;" hidden>Name</label>
          <input type="text" class="form-control @error('contact_name') is-invalid @enderror" id="contact_name" name="contact_name" placeholder="Name" value="{{old('contact_name')}}">
          @error('contact_name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-2 col-md-10 mx-auto">
          <label for="contact_email" class="form-label" style="font-size: 10px;" hidden>Email</label>
          <input type="text" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" placeholder="Email" value="{{old('contact_email')}}">
          @error('contact_email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

      <div class="mb-2 col-md-10 mx-auto">
        <label for="contact_title" class="form-label" style="font-size: 10px;" hidden>Job Title</label>
        <input type="text" class="form-control @error('contact_title') is-invalid @enderror" id="contact_title" name="contact_title" placeholder="Job Title " value="{{old('contact_title')}}">
        @error('contact_title')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-2 col-md-10 mx-auto">
        <label for="contact_phone" class="form-label" style="font-size: 10px;" hidden>Phone number</label>
        <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" placeholder="Phone" value="{{old('contact_phone')}}">
        @error('contact_phone')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

        <input type="hidden" name="client_id" value="{{ $client->id }}"> {{-- hidden client id value for submition --}}

        <div class="text-center ">
          <button type="submit" class="btn btn-primary btn-sm d-inline mt-4 mb-5">Add</button>
          <button type="reset" id="clearButton" class="btn btn-danger btn-sm mt-4 mb-5">Clear</button>
        </div>
        </form>

    <!-- / ADD CONTACT FORM -->

    <script>
      $(document).ready(function() {
        // Reset form fields on modal close
        $('#modalClientEdit').on('hidden.bs.modal', function() {
          setTimeout(function() {
            $('#formAuthentication .is-invalid').removeClass('is-invalid'); // Remove 'is-invalid' class from form fields
            $('#formAuthentication .invalid-feedback').remove(); // Remove all elements with the class 'invalid-feedback'
            $('#formAuthentication input[type="text"]').val('');// Clear the value of all input fields within forms that are NOT hidden (token and client id are preserved)
          }, 100);
        });
      });

      $(document).ready(function() {
        $('#clearButton').on('click', function() {
          setTimeout(function() {
            $('#formAuthentication :input:not(:hidden)').val('');
            $('#formAuthentication .is-invalid').removeClass('is-invalid'); // Remove 'is-invalid' class from form fields
            $('#formAuthentication .invalid-feedback').remove(); // Remove all elements with the class 'invalid-feedback'
          }, 100);
        });
      });
    </script>

