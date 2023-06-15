{{-- SHOW CONTACT COMPONENT --}}

<div class="table-responsive text-nowrap p-3">
    @if ($contacts->isEmpty())
        <p class="text-center">This client has no contacts associated.</p>
    @else
        <div id="message"></div>
        <table class="table table-hover table-sm p-4" data-page="1" data-page-size="3" data-current-page="1">
            <thead>
                <tr>
                    <th class="sortable" data-sort-by="name">Name</th>
                    <th class="sortable" data-sort-by="title">Job Title</th>
                    <th class="sortable" data-sort-by="email">Email</th>
                    <th class="sortable" data-sort-by="phone">Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="contacts-table">

            </tbody>
        </table>
    @endif
    {{-- EDIT button --}}
        <!-- Button trigger modal -->
        <div class="col-sm-12 d-flex justify-content-end">
          <a href="#" class="btn p-0 d-flex justify-content-end mt-2" data-bs-toggle="modal" data-bs-original-title="Add Contact" data-bs-target="#modalClientEdit" title="Add Contact" aria-describedby="tooltip674202">
            <i class='bx bxs-plus-circle' style="font-size: 30px"></i>
          </a>
        </div>

      <!-- Modal -->
      <div class="modal fade" id="modalClientEdit" aria-labelledby="modalClientEditLabel" tabindex="-1" aria-hidden="true" style="--bs-modal-width: 30rem;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Add a new contact to {{$client->name}}'s contact list</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @component('content.management.add-contact-form')
              @slot('client', $client)
              @slot('contacts', $contacts)
            @endcomponent
          </div>
        </div>
      </div>
</div>
<!-- /Contact table -->

<!-- AJAX for Live Table Edition -->
<script>
    var client_id = {{ $client->id }};
    var conditionsMet = true; // Flag to track if conditions are met
    var originalValues = {}; // Object to store the original values of the columns
    $(document).ready(function() {
        fetch_data(client_id);

        function getLimitedText(text, addTooltip) {
          if (text.length > 25) {
            var limitedText = text.substring(0, 22) + '...';
            if (addTooltip) {
              return '<span class="limited-text" data-original-text="' + text + '" data-bs-toggle="tooltip" title="' + text + '">' + limitedText + '</span>';
            } else {
              return '<span class="limited-text" data-original-text="' + text + '">' + limitedText + '</span>';
            }
          }
          return text;
        }


        function fetch_data(client_id) {
            $.ajax({
                url: "/livetable/fetch_data/" + client_id,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    var alertflag = false;

                    for (var count = 0; count < data.length; count++) {
                      html +='<tr>';
                      html += '<td contenteditable="false" spellcheck="false" class="column_name" data-column_name="contact_name" data-id="' + data[count].id + '">' + getLimitedText(data[count].contact_name) + '</td>';
                      html += '<td contenteditable="false" spellcheck="false" class="column_name" data-column_name="contact_title" data-id="' + data[count].id + '">' + getLimitedText(data[count].contact_title) + '</td>';
                      html += '<td contenteditable="false" spellcheck="false" class="column_name" data-column_name="contact_email" data-id="' + data[count].id + '">' + getLimitedText(data[count].contact_email, true) + '</td>';
                      html += '<td contenteditable="false" spellcheck="false" class="column_name" data-column_name="contact_phone" data-id="' + data[count].id + '">' + getLimitedText(data[count].contact_phone) + '</td>';
                      html += '<td><button type="button" class="btn btn-primary btn-xs me-1 edit" id="' + data[count].id + '">Edit</button><button type="button" class="btn btn-danger btn-xs delete" id="' + data[count].id + '">Delete</button></td>';

                    }
                    $('tbody').html(html);
                }
            });
        }
          //BACKEND jQUERY HANDKING
        var _token = $('input[name="_token"]').val();

        $(document).on('click', '.edit', function() {
          alertflag = false;
          conditionsMet = true;

          var row = $(this).closest('tr');
          row.find('.column_name').each(function() {
            var cell = $(this);
            var originalText = cell.find('.limited-text').data('original-text');
            cell.text(originalText).attr('contenteditable', 'true').addClass('editable');
          });

          row.find('.edit')
            .removeClass('btn-primary')
            .addClass('btn-success')
            .text('Save')
            .addClass('save')
            .removeClass('edit');

          row.find('.delete')
            .text('Cancel')
            .addClass('cancel')
            .removeClass('delete');
        });


        $(document).on('click', '.save', function() { //End - Save button that on click makes row uneditable
            alertflag = true;
            conditionsMet = true; // Flag to track if conditions are met

            var row = $(this).closest('tr');
            row.find('.column_name').attr('contenteditable', 'false').removeClass('editable');
            row.find('.save')
              .removeClass('btn-success')
              .addClass('btn-primary')
              .text('Edit')
              .addClass('edit')
              .removeClass('save');

            row.find('.cancel')
              .text('Delete')
              .addClass('delete')
              .removeClass('cancel');

            fetch_data(client_id);
        });

        $(document).on('click', '.cancel', function() { //End - Save button that on click makes row uneditable
            alertflag = false;
            conditionsMet = false; // Flag to track if conditions are met
            var row = $(this).closest('tr');
            row.find('.column_name').attr('contenteditable', 'false').removeClass('editable');
            row.find('.save')
              .removeClass('btn-success')
              .addClass('btn-primary')
              .text('Edit')
              .addClass('edit')
              .removeClass('save');

            row.find('.cancel')
              .text('Delete')
              .addClass('delete')
              .removeClass('cancel');

            fetch_data(client_id);
        });

        $(document).on('blur', '.column_name.editable', function() {
          var row = $(this).closest('tr');
          row.find('.column_name').attr('contenteditable', 'true').addClass('editable');

          var column_name = $(this).data("column_name");
          var column_value = $(this).text();
          var id = $(this).data("id");



          if (column_value != '') {
              if (column_name == 'contact_phone') {
                  if (column_value.toLowerCase() !== 'not provided' &&
                      (isNaN(column_value) ||
                          column_value.length < 9 ||
                          column_value.length > 15 ||
                          /\s/.test(column_value) ||
                          /\r|\n/.test(column_value)
                      )
                  ) {
                      $('#message').html(
                          "<div class='alert alert-danger text-centered'>Phone number is invalid</div>"
                      );
                      conditionsMet = false; // Conditions are not met
                  }
              } else if (column_name == 'contact_name') {
                  if (!/^[\p{L}\p{M}\s.'-]+$/u.test(column_value)) {
                      $('#message').html(
                          "<div class='alert alert-danger'>Contact name must contain only letters, white spaces, and dots</div>"
                      );
                      $(this).addClass('bg-danger');
                      conditionsMet = false; // Conditions are not met
                  }
              } else if (column_name == 'contact_email') {
                  var original_value = column_value;
                  $.ajax({
                      url: "{{ route('livetable.check_email') }}",
                      method: "POST",
                      data: {
                          contact_email: column_value,
                          id: id,
                          _token: _token
                      },
                      success: function(result) {
                          console.log("check_email success:", result);
                          if (result === 'exists') {
                              $('#message').html(
                                  "<div class='alert alert-danger'>Contact email <i>" +
                                  column_value + "</i> already exists</div>"
                              );
                              conditionsMet = false; // Conditions are not met
                          } else if (result === 'invalid_email') {
                              $('#message').html(
                                  "<div class='alert alert-danger'>Email <i>" +
                                  column_value + "</i> is invalid</div>"
                              );
                              conditionsMet = false; // Conditions are not met
                          } else {
                              // Continue with the update
                          }
                      }.bind(this),
                      async: false // Make the request synchronous
                  });
              }

              if (conditionsMet) {
                  $.ajax({
                      url: "{{ route('livetable.update_data') }}",
                      method: "POST",
                      data: {
                          column_name: column_name,
                          column_value: column_value,
                          id: id,
                          _token: _token
                      },
                      success: function(data) {
                          if (alertflag) {
                              $('#message').html(data);
                          } else {
                              $(this).removeClass('alert alert-success');
                          }
                      }.bind(this)
                  });
              }
          } else {
              $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
          }
      });


        $(document).on('click', '.delete', function() {
            var id = $(this).attr("id");
            var email = $(this).closest('tr').find('[data-column_name="contact_email"]').text();
            if (confirm("Are you sure you want to delete contact " + email + "?")) {
                $.ajax({
                    url: "{{ route('livetable.delete_data') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#message').html(data);
                        fetch_data(client_id);
                    }
                });
            }
        });
        fetch_data(client_id);
    });
</script>
