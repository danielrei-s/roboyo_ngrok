@extends('layouts/contentNavbarLayout')

@section('title', 'Client Management - Client Tables')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style2 mb-2">
    <li class="breadcrumb-item">
      <a href="{{ secure_url('/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      <a href="{{ route('client-management') }}">Client Management</a>
    </li>
  </ol>
</nav>

{{-- Direct copy of tables page --}}

<!-- Bootstrap Dark Table -->
<div class="card">
  <div class="card">
    <h5 class="card-header d-flex justify-content-between align-items-center">
      <span>All Clients</span>
      <div class="align-items-left">
        @component('content.management.create-client', ['contactObjects' => $contactObjects, 'clients' => $clients])
        @endcomponent
      </div>
    </h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-dark">
      <thead>
  <tr>
    <th>Logo</th>
    <th class="sortable" data-sort-by="code">
      Code
      <span class="arrow-up"></span>
      <span class="arrow-down visible"></span>
    </th>
    <th class="sortable" data-sort-by="name">
      Name
      <span class="arrow-up"></span>
      <span class="arrow-down visible"></span>
    </th>
    <th class="sortable" data-sort-by="address">
      Address
      <span class="arrow-up"></span>
      <span class="arrow-down visible"></span>
    </th>
    <th>Actions</th>
  </tr>
</thead>
      <tbody class="table-border-bottom-0">
        @foreach ($clientObjects as $client)
        <tr>
          <td><img src="{{ secure_asset($client->logo) }}" alt="{{ $client->name }}" class="rounded-circle" style="width: 50px; height: 50px;"></td>
          <td><b>{{ $client->code }}</b></td>
          <td class="text-truncate" style="max-width: 200px;">{{ $client->name }}</td>
          <td class="text-truncate" style="max-width: 200px;">{{ $client->address }}</td>
          <td>

                {{-- delete button --}}
            <a class="btn p-0" href="#"  data-bs-toggle="tooltip"
                data-bs-original-title="Delete client"
                aria-describedby="tooltip674202"
                onclick="event.preventDefault();
                  if (confirm('Are you sure you want to delete {{$client->name}}?'  )) {
                    document.getElementById('delete-client-{{ $client->id }}').submit();
                  }">
                  <i class="bx bx-trash me-1"title="Delete Client" style="font-size: 26px;"></i>
                </a>
                <form id="delete-client-{{ $client->id }}" action="{{ route('client-management.destroy', $client->id) }}" method="POST" style="display: none; ">
                  @csrf
                  @method('DELETE')
                </form>

                {{-- view button  --}}
            <a class="btn p-0" href="{{ route('client.profile', ['id' => $client->id]) }}" data-bs-toggle="tooltip" data-bs-original-title="View client" aria-describedby="tooltip674202">
              <i class="bx bx-show-alt me-1 " title="View Client" style="font-size: 26px;"></i>
            </a>
          </td>
        </tr>
        @endforeach
        <script src="{{ secure_asset('assets/js/table-sort.js') }}"></script>
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $clients->links('pagination::bootstrap-4') }}
    </div>
</div>
@if ($errors->any())
    <script>
        $(document).ready(function(){
            $('#modalToggle').modal('show');
        });
    </script>
  @endif
<!--/ Bootstrap Dark Table -->
@endsection
