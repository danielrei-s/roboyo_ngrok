@extends('layouts/contentNavbarLayout')

@section('title', 'User Management - User Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">User Management /</span> Users Table
</h4>

{{-- Direct copy of tables page --}}


<!-- Bootstrap Dark Table -->
<div class="card">
  <h5 class="card-header">All Users</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-dark">
      <thead>
        <tr>
          <th>Picture</th>
          <th>Name</th>
          <th>Email</th>
          <th>Initials</th>
          <th>Privileges</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($userObjects as $user)
          <tr>
            <td><img src="{{ asset($user->picture) }}" alt="{{ $user->firstName }} {{ $user->lastName }}"
               class="rounded-circle" style="width: 50px; height: 50px;"></td>
            <td>{{ $user->firstName }} {{ $user->lastName }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->sigla }}</td>
            <td>
              @if($user->admin)
                  <span class="badge bg-label-warning me-1">Admin</span>
              @elseif($user->manager)
                  <span class="badge bg-label-info me-1">Manager</span>
              @else
                  <span class="badge bg-label-success me-1">Pentester</span>
              @endif
            </td>
            <td>{{ $user->role }}</td>
            <td><div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
              data-bs-toggle="dropdown"data-user-id="{{ $user->id }}">
                <i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" title="View Profile"><i class="bx bx-show-alt me-1" title="View Profile"></i> View</a>
                <a class="dropdown-item" href="javascript:void(0);" title="Force Password Change"><i class="bx bx-lock me-1"title="Force Password Change"></i> Password</a>
                <a class="dropdown-item" href="javascript:void(0);" title="Block User"><i class="bx bx-block me-1"title="Block User"></i> Block</a>
                <a class="dropdown-item" href="#" title="Delete User"onclick="event.preventDefault();
                  if (confirm('Are you sure you want to delete {{$user->firstName}} {{$user->lastName}} ?'  )) {
                    document.getElementById('delete-user-{{ $user->id }}').submit();
                  }">
                  <i class="bx bx-trash me-1"title="Delete User"></i>Delete
                </a>
                <form id="delete-user-{{ $user->id }}" action="{{ route('user-management.destroy', $user->id) }}" method="POST" style="display: none; ">
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
</div>
<!--/ Bootstrap Dark Table -->
@endsection
