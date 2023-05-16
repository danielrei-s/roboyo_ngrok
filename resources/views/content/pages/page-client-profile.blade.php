@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style2 mb-2">
    <li class="breadcrumb-item">
      <a href="{{ url('/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ route('client-management') }}">Client Management</a>
    </li>
    <li class="breadcrumb-item active">
      <a href="#">Client Profile</a>
    </li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-row flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
        Account</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#"><i class="bx bx-bell me-1"></i>
        Others</a>
      </li>
    </ul>
      <div class="card mb-4">
          <h5 class="card-header">Client Details</h5>
          <!-- Account -->
          <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <img src="{{ asset($client->logo) }}"
                      alt="{{ $client->name }}" class="d-block rounded"
                      height="150" width="150" id="userAvatar" />
                  <div class="button-wrapper">
                    <div class="container">
                      <p class="fw-bold fs-4">{{ $client->code }} |<span class="fw-semibold small"> {{ $client->name }}</span></p>
                      <p class="fs-9"><i class="bx bxs-buildings"></i><span class="fw-semibold"> Address: </span>{{ $client->address }}</p>
                      <p class="fs-9"><i class="bx bxs-id-card"></i><span class="fw-semibold"> TIN: </span>{{ $client->tin }}</p>
                      <p class="fs-9"><i class="bx bxs-phone"></i><span class="fw-semibold"> Phone: </span>{{ $client->phone }}</p>
                    </div>
                  </div>
                    <div style="border-left: 2px dashed #ccc; padding-left: 120px;">
                        <!-- Doted line a separar -->
                        <div class="button-wrapper">
                            <div class="d-flex align-items-start align-items-sm-center justify-content-end gap-4">
                                <div class="d-flex flex-column align-items-start">
                                  {{-- <a href="#" class="btn p-0" data-bs-toggle="modal" data-bs-original-title="View Contacts" data-bs-target="#modalContact" title="View client contacts" aria-describedby="tooltip674202">
                                    <i class='bx bx-sitemap' style="font-size: 30px"></i>
                                  </a> --}}


                                  <!-- Modal -->
                                  {{-- <div class="modal fade" id="modalContact" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                      <div class="modal-content" style="width: 400rem;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalContactTitle"></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                          @component('livetable', ['contacts' => $contacts, 'client' => $client])

                                          @endcomponent
                                        </div>
                                      </div>
                                      </div> --}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                    {{-- anchor to link the DELETE --}}
                      <a class="btn p-0" href="#" data-bs-toggle="tooltip" aria-label="Delete client" data-bs-original-title="Delete client" aria-describedby="tooltip674202" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete {{$client->name}}?')) { document.getElementById('delete-client-{{ $client->id }}').submit(); }">
                        <i class="bx bx-trash me-1" title="Delete Client" style="font-size: 32px;"></i>
                      </a>

                    {{-- form to handle the DELETE --}}
                      <form id="delete-client-{{ $client->id }}" action="{{ route('client-management.destroy', $client->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>
                    {{-- /DELETE FORM --}}

                    {{-- EDIT button --}}
                    <!-- Button trigger modal -->
                    {{-- <a href="#" class="btn p-0" data-bs-toggle="modal" data-bs-original-title="Edit client" data-bs-target="#modalClientEdit" title="Edit client profile" aria-describedby="tooltip674202">
                      <i class='bx bx-edit' style="font-size: 30px"></i>
                    </a> --}}

                    <!-- Modal -->
                    {{-- <div class="modal fade" id="modalClientEdit" aria-labelledby="modalClientEditLabel" tabindex="-1" aria-hidden="true" style="--bs-modal-width: 65rem;">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Edit {{$client->name}}'s client profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          @component('content.management.edit-client')
                            @slot('client', $client)
                            @slot('contacts', $contacts)
                          @endcomponent
                        </div>
                      </div>
                    </div> --}}
                </div>

              <hr class="my-1">
              <div class="card-body">
                <!-- Accordion -->
                <div class="row">
                  <div class="col-md mb-4 mb-md-0">
                      <div class="accordion mt-3" id="accordionExample">
                        <!-- Accordion VIEW EDIT CONTACTS -->
                        <div class="card accordion-item active">
                            <h2 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button"
                                    data-bs-toggle="collapse" data-bs-target="#accordionOne"
                                    aria-expanded="true" aria-controls="accordionOne">
                                     View {{$client->name}}'s Contacts
                                </button>
                            </h2>

                            <div id="accordionOne" class="accordion-collapse collapse show"
                               data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- BODY FOR VIEW/EDIT CONTACTS -->
                                  <div class="card-body">
                                    <div class="align-items-center gap-2">
                                      @component('content.management.show-contact-table')
                                      @slot('client', $client)
                                      @slot('contacts', $contacts)
                                      @endcomponent
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                          <!-- Accordion EDIT CLIENT -->
                          <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button type="button" class="accordion-button collapsed"
                                data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                aria-expanded="false" aria-controls="accordionTwo">
                                Edit Client
                              </button>
                            </h2>
                            <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                  <div class="card-body">
                                      <!-- accordion body -->
                                      @component('content.management.edit-client')
                                      @slot('client', $client)
                                      @slot('contacts', $contacts)
                                      @endcomponent
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- Accordion Status -->
                          <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                              <button type="button" class="accordion-button collapsed"
                                data-bs-toggle="collapse" data-bs-target="#accordionThree"
                                aria-expanded="false" aria-controls="accordionThree">
                                Status
                              </button>
                            </h2>
                            <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                  <div class="card-body">
                                      <!-- body -->
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!-- Accordion Assessements -->
                          <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                              <button type="button" class="accordion-button collapsed"
                                data-bs-toggle="collapse" data-bs-target="#accordionFour"
                                aria-expanded="false" aria-controls="accordionFour">
                                Assessments
                              </button>
                            </h2>
                            <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                  <div class="card-body">
                                      <!-- body -->
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

  @if ($errors->any())
    <script>
      $(document).ready(function() {
        setTimeout(function() {   //necessary for modal to fully load and attach to DOM before being called again.
            $('#modalClientEdit').modal('show');
              }, 1);
        });
    </script>
  @endif

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
