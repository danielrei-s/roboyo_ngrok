@extends('layouts/contentNavbarLayout')

@section('title', 'User Management - User Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light"> Client Management /</span> Client Table
</h4>

{{-- Direct copy of tables page --}}

<!-- Bootstrap Dark Table -->
<div class="card">
  <h5 class="card-header">All Clients</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-dark">
      <thead>
        <tr>
          <th>Logo</th>
          <th>Code</th>
          <th>Name</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($clientObjects as $client)
          <tr>
            <td><img src="{{ asset($client->logo) }}" alt="{{ $client->name }}"
               class="rounded-circle" style="width: 50px; height: 50px;"></td>
            <td>{{ $client->code }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->address }}</td>
            <td><div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
              data-bs-toggle="dropdown"data-user-id="{{ $client->id }}">
                <i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">

                {{-- route to view selected user profile --}}
                <a class="dropdown-item" href="{{ route('user.profile', ['id' => $client->id]) }}"
                data-bs-toggle="tooltip" aria-label="View User Profile"
                data-bs-original-title="View User Profile" aria-describedby="tooltip674202">
                <i class="bx bx-show-alt me-1" title="View Profile"></i> View</a>

                {{-- form to handle the DELETE --}}
                <a class="dropdown-item" href="#"  data-bs-toggle="tooltip"
                data-bs-original-title="Delete user"
                aria-describedby="tooltip674202"
                onclick="event.preventDefault();
                  if (confirm('Are you sure you want to delete {{$client->name}} ?'  )) {
                    document.getElementById('delete-user-{{ $client->id }}').submit();
                  }">
                  <i class="bx bx-trash me-1"title="Delete User"></i>Delete
                </a>
                <form id="delete-user-{{ $client->id }}" action="{{ route('user-management.destroy', $client->id) }}" method="POST" style="display: none; ">
                  @csrf
                  @method('DELETE')
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $clients->links('pagination::bootstrap-4') }}
    </div>
</div>
<!--/ Bootstrap Dark Table -->
@endsection
