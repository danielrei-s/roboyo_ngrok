
  {{-- <div class="container box">
   <h3 align="center">All Client Contacts - Update {{$client->id}}</h3><br />
   <div class="panel panel-default">

    <div class="panel-body">
     <div id="message"></div>
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Name</th>
         <th>Title</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Action</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>
 {{-- </body>
</html> --}} --}}
{{-- <script>
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
    html += '<tr>';
    html += '<td contenteditable id="contact_name"></td>';
    html += '<td contenteditable id="contact_title"></td>';
    html += '<td contenteditable id="contact_email"></td>';
    html += '<td contenteditable id="contact_phone"></td>';
    // html += '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
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

 $(document).on('click', '#add', function(){
  var contact_name = $('#contact_name').text();
  var contact_title = $('#contact_title').text();
  if(contact_name != '' && contact_title != '')
  {
   $.ajax({
    url:"{{ route('livetable.add_data') }}",
    method:"POST",
    data:{contact_name:contact_name, contact_title:contact_title, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
  else
  {
   $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
  }
 });

 $(document).on('blur', '.column_name', function(){
  var column_name = $(this).data("column_name");
  var column_value = $(this).text();
  var id = $(this).data("id");

  if(column_value != '')
  {
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
  if(confirm("Are you sure you want to delete this records?"))
  {
   $.ajax({
    url:"{{ route('livetable.delete_data') }}",
    method:"POST",
    data:{id:id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
 });


 fetch_data(client_id);
});
</script> --}}

