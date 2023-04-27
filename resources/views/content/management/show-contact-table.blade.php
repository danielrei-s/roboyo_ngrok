
 {{-- SHOW CONTACT COMPONENT --}}

                    <!-- Contact table -->

                  <div class="p-3">  <!-- padding around the table -->
                  <div class="table-responsive text-nowrap">
                    <h5 class="text-center mb-4">{{$client->name}}'s contacts list</h5>
                    <table class="table table-hover table-sm p-3"  data-page="1" data-page-size="3" data-current-page="1">
                      <thead>
                        <tr>
                            <th class="sortable" data-sort-by="name">Name</th>
                            <th class="sortable" data-sort-by="email">Email</th>
                            <th class="sortable" data-sort-by="phone">Phone</th>
                            <th class="sortable" data-sort-by="title">Title</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="contacts-table">
                        @foreach ($contacts as $contact )
                        <tr>
                            <td>{{$contact->contact_name}}</td>
                            <td>{{$contact->contact_email}}</td>
                            <td>{{$contact->contact_phone}}</td>
                            <td>{{$contact->contact_title}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center align-items-center mt-3 gap-4">
                      <button type="button" class="btn btn-primary">Edit</button>
                      <button type="button" class="btn btn-danger">Remove</button>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            <!-- /Contact table -->
