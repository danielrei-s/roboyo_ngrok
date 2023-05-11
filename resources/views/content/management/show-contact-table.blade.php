
 {{-- SHOW CONTACT COMPONENT --}}

          <!-- Contact table -->

    <div class="table-responsive text-nowrap p-3">
      <h5 class="text-center mb-4">{{$client->name}}'s contact list</h5>
        @if($contacts->isEmpty())
          <p class="text-center">This client has no contacts associated.</p>
        @else
        <div id="message"></div>
      <table class="table table-hover table-sm p-3"  data-page="1" data-page-size="3" data-current-page="1">
          <thead>
            <tr>
              <th class="sortable" data-sort-by="name">Name</th>
              <th class="sortable" data-sort-by="title">Title</th>
              <th class="sortable" data-sort-by="email">Email</th>
              <th class="sortable" data-sort-by="phone">Phone</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0" id="contacts-table">

        </tbody>
      </table>
      @endif
    </div>



            <!-- /Contact table -->
  <script>
    var client_id = {{ $client->id }};
    fetch_data(client_id);
  </script>

  <script>
  $(document).ready(function(){

    fetch_data();

    function fetch_data(client_id)
    {
    $.ajax({
      url:"/livetable/fetch_data/" + client_id,
      dataType:"json",
      success:function(data)
      {
      var html = '';

      for(var count=0; count < data.length; count++)
      {
        html +='<tr>';
        html +='<td contenteditable class="column_name" data-column_name="contact_name" data-id="'+data[count].id+'">'+data[count].contact_name+'</td>';
        html += '<td contenteditable class="column_name" data-column_name="contact_title" data-id="'+data[count].id+'">'+data[count].contact_title+'</td>';
        html += '<td contenteditable class="column_name" data-column_name="contact_email" data-id="'+data[count].id+'">'+data[count].contact_email+'</td>';
        html += '<td contenteditable class="column_name" data-column_name="contact_phone" data-id="'+data[count].id+'">'+data[count].contact_phone+'</td>';
        html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></tr>';
      }
      $('tbody').html(html);
      }
    });
    }

    var _token = $('input[name="_token"]').val();


    $(document).on('blur', '.column_name', function(){
      var column_name = $(this).data("column_name");
      var column_value = $(this).text();
      var id = $(this).data("id");

      if(column_value != '')
      {
        if (column_name == 'contact_phone') {
          if (column_value.length < 9) {
            $('#message').html("<div class='alert alert-danger'>Contact phone must be 9 digits or more</div>");
            return;
          }
        }
        else if (column_name == 'contact_name') {
          if (!/^[a-zA-Z\s.]+$/.test(column_value)) {
            $('#message').html("<div class='alert alert-danger'>Contact name must contain only letters and white spaces</div>");
            return;
          }
        }
        else if (column_name == 'contact_email') {
          var current_email = $('#contact_' + id + ' .contact_email').text();
          console.log(current_email);
          if (column_value === current_email) {
            console.log(column_value);
            return;
          }
          $.ajax({
            url:"{{ route('livetable.check_email') }}",
            method:"POST",
            data:{contact_email:column_value, _token:_token},
            success:function(result)
            {
              console.log(result);
              if (result === 'exists') {
                $('#message').html("<div class='alert alert-danger'>Contact email already exists</div>");
              }
            }
          });
        }

        $.ajax({
          url:"{{ route('livetable.update_data') }}",
          method:"POST",
          data:{column_name:column_name, column_value:column_value, id:id, _token:_token},
          success:function(data)
          {
            $('#message').html(data);
          }
        })
      }
      else
      {
        $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
      }
    });


    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      var email = $(this).closest('tr').find('[data-column_name="contact_email"]').text();
      if(confirm("Are you sure you want to delete contact "+ email +"?"))
      {
        $.ajax({
        url:"{{ route('livetable.delete_data') }}",
        method:"POST",
        data:{id:id, _token:_token},
        success:function(data)
        {
          $('#message').html(data);
          fetch_data(client_id);
        }
        });
      }
    });



    fetch_data(client_id);
  });
  </script>
