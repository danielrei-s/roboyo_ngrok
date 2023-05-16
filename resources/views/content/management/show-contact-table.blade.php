
 {{-- SHOW CONTACT COMPONENT --}}

    <div class="table-responsive text-nowrap p-3">
        @if($contacts->isEmpty())
          <p class="text-center">This client has no contacts associated.</p>
        @else
        <div id="message"></div>
      <table class="table table-hover table-md p-4"  data-page="1" data-page-size="3" data-current-page="1">
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

            <!-- AJAX for Live Table Edition -->
  <script>
    var client_id = {{ $client->id }};
    $(document).ready(function(){

      fetch_data(client_id);

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
          html +='<td contenteditable spellcheck="false" class="column_name" data-column_name="contact_name" data-id="'+data[count].id+'">'+data[count].contact_name+'</td>';
          html += '<td contenteditable spellcheck="false" class="column_name" data-column_name="contact_title" data-id="'+data[count].id+'">'+data[count].contact_title+'</td>';
          html += '<td contenteditable spellcheck="false" class="column_name" data-column_name="contact_email" data-id="'+data[count].id+'">'+data[count].contact_email+'</td>';
          html += '<td contenteditable spellcheck="false" class="column_name" data-column_name="contact_phone" data-id="'+data[count].id+'">'+data[count].contact_phone+'</td>';
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
          if (column_value.toLowerCase() !== 'not provided' && (isNaN(column_value) || column_value.length < 9)) {  //not a number, <9 digits, or not provided ->fails
            $('#message').html("<div class='alert alert-danger text-centered'>Phone number is invalid</div>");
            $(this).addClass('bg-danger');
            return;
          }
        }
      else if (column_name == 'contact_name') {
        console.log(column_value);
        if (!/^[\p{L}\p{M}\s.'-]+$/u.test(column_value)) {
          $('#message').html("<div class='alert alert-danger'>Contact name must contain only letters, white spaces and dots</div>");
          $(this).addClass('bg-danger');
          return;
        }
      }
    else if (column_name == 'contact_email') {
            var original_value = column_value;
            $.ajax({
                url:"{{ route('livetable.check_email') }}",
                method:"POST",
                data:{contact_email:column_value, id:id, _token:_token},
                success:function(result)
                {
                  console.log("check_email success:", result);
                    if (result === 'exists') {
                        $('#message').html("<div class='alert alert-danger'>Contact email <i>" + column_value + "</i> already exists</div>");
                        $(this).addClass('bg-danger');
                        $(this).text(original_value);
                    } else {
                        $(this).removeClass('bg-danger');
                    }
                }.bind(this)
              });
              // return;
        }

        $.ajax({
          url:"{{ route('livetable.update_data') }}",
          method:"POST",
          data:{column_name:column_name, column_value:column_value, id:id, _token:_token},
          success:function(data)
          {
            $('#message').html(data);
            // remove red background if it was added before
            $(this).removeClass('bg-danger');
          }.bind(this)
        });
          }
          else
          {
            $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
            $(this).addClass('bg-danger');
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
