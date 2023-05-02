
 {{-- SHOW CONTACT COMPONENT --}}

                    <!-- Contact table -->

                  <div class="p-3">  <!-- padding around the table -->
                  <div class="table-responsive text-nowrap">
                    <h5 class="text-center mb-4">{{$client->name}}'s contacts list</h5>
                      @if($contacts->isEmpty())
                        <p class="text-center">This client has no contacts associated.</p>
                      @else
                    <table class="table table-hover table-sm p-3"  data-page="1" data-page-size="3" data-current-page="1">
                      <thead>
                        <tr>
                            <th class="sortable" data-sort-by="name">Name</th>
                            <th class="sortable" data-sort-by="email">Email</th>
                            <th class="sortable" data-sort-by="phone">Phone</th>
                            <th class="sortable" data-sort-by="title">Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="contacts-table">
                      @foreach ($contacts as $contact )
                      <tr>
                        <td>{{$contact->contact_name}}</td>
                        <td>{{$contact->contact_email}}</td>
                        <td>{{$contact->contact_phone}}</td>
                        <td>{{$contact->contact_title}}</td>
                        <td class="text-centered">
                          <div class="dropdown d-flex align-items-center">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                              data-bs-toggle="dropdown" data-user-id="{{ $contact->id }}">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">

                              {{-- display contact information or form with editable fields --}}
                              <button class="dropdown-item" onclick="toggleEdit({{$contact->id}})">
                                <i class="bx bx-edit me-1" title="Edit Contact"></i> Edit
                              </button>


                              {{-- form to handle the DELETE --}}
                              <a class="dropdown-item" href="#"  data-bs-toggle="tooltip"
                                data-bs-original-title="Delete contact"
                                aria-describedby="tooltip674202"
                                onclick="event.preventDefault();
                                if (confirm('Are you sure you want to delete {{$contact->contact_name}} from {{$client->name}}`s contact list?'  )) {
                                  document.getElementById('delete-contact-{{ $contact->id }}').submit();
                                }">
                                <i class="bx bx-trash me-1" title="Delete contact"></i>Delete
                              </a>
                              <form id="delete-contact-{{ $contact->id }}" action="{{ route('contact-management.destroy', $contact->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                    </table>
                    @endif
                  </div>
                </div>


            <!-- /Contact table -->
