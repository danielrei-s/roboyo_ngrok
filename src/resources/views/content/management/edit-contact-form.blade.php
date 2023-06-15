


<form id="formAuthentication" action="{{ route('auth-edit-contact') }}" method="POST">
  @csrf {{-- Evitar ataques csrf --}}
  <input type="hidden" name="contact_id" value="{{ $contact_id }}"> {{-- Send contact ID --}}
      <h6 class="text-center mb-4"> Edit Contact</h6>
    <div class="mb-2 mt-2">
        <label for="contact_name" class="form-label" style="font-size: 10px;" hidden>Name</label>
        <input type="text" class="form-control @error('contact_name') is-invalid @enderror" id="contact_name" name="contact_name" placeholder="Name" value="{{$contact_name}}">
        @error('contact_name')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-2">
        <label for="contact_email" class="form-label" style="font-size: 10px;" hidden>Email</label>
        <input type="text" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" placeholder="Email" value="{{$contact_email}}">
        @error('contact_email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

    <div class="mb-2">
      <label for="contact_title" class="form-label" style="font-size: 10px;" hidden>Job Title</label>
      <input type="text" class="form-control @error('contact_title') is-invalid @enderror" id="contact_title" name="contact_title" placeholder="Job Title" value="{{$contact_title}}">
      @error('contact_title')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="contact_phone" class="form-label" style="font-size: 10px;" hidden>Phone number</label>
      <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" placeholder="Phone" value="{{$contact_phone}}">
      @error('contact_phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="text-center modal-footer ">
      <button type="submit" class="btn btn-primary btn-sm d-inline mt-3">Update</button>
      <button type="reset" class="btn btn-danger btn-sm mt-1">Clear</button>
    </div>
</form>
<!-- / ADD CONTACT FORM -->
