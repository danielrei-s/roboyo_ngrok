<!-- Load jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<!-- Load Tabledit plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" async ></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" async ></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js" async ></script>



@props(['data'])
<body>
<div class="container">
  <div class="table-responsive text-nowrap p-3">
    {{-- <h5 class="text-center mb-4">{{$client->name}}'s contacts list</h5> --}}
      @if($data->isEmpty())
        <p class="text-center">This client has no contacts associated.</p>
      @else
  <div class="panel panel-default">
    <div class="panel-heading">
      {{-- <h3 class="panel-title">Sample Data</h3> --}}
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        @csrf
        <table id="editable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Title</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td>{{ $row->contact_name }}</td>
              <td>{{ $row->contact_title }}</td>
              <td>{{ $row->contact_email }}</td>
              <td>{{ $row->contact_phone }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endif
</div>
</div>
</body>

<script type="text/javascript">
$(document).ready(function(){

$.ajaxSetup({
headers:{
  'X-CSRF-Token' : $("input[name=_token]").val()
}
});

$('#editable').Tabledit({
url:'{{ route("tabledit.action") }}',
dataType:"json",
columns:{
  identifier:[0, 'id'],
  editable:[[1, 'contact_name'], [2, 'contact_title'], [3, 'contact_email'], [4, 'contact_phone']]
},
restoreButton:false,
onSuccess:function(data, textStatus, jqXHR)
{
  if(data.action == 'delete')
  {
    $('#'+data.id).remove();
  }
}
});

});
</script>

</body>
