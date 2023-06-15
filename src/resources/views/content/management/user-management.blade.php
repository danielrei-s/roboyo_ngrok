@extends('layouts/contentNavbarLayout')

@section('title', 'User Profile')

@section('page-script')
    <script src="{{ secure_asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style2 mb-2">
    <li class="breadcrumb-item">
      <a href="{{ secure_url('/') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      <a href="{{ route('user-management') }}">User Management</a>
    </li>
  </ol>
</nav>

{{-- Direct copy of tables page --}}


<!-- Bootstrap Dark Table -->
<div class="card">
  <h5 class="card-header d-flex justify-content-between align-items-center">
    <span>All Users</span>
    <div class="align-items-left">
      @component('content.management.create-user')
      @endcomponent
    </div>
  </h5>
  <!-- /Add user modal -->

  <div class="table-responsive text-nowrap">
    <table class="table table-dark" style="min-height: 240px;">  <!-- min height prevent overlaps when there are < 2 entries -->
      <thead>
        <tr>
          <th> Picture </th>
          <th class="sortable" data-sort-by="firstName">Name</th>
          <th class="sortable" data-sort-by="email">Email</th>
          <th class="sortable" data-sort-by="sigla">Initials</th>
          <th class="sortable" data-sort-by="admin">Privileges</th>
          <th class="sortable" data-sort-by="role">Job Title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($userObjects as $user)
          <tr>
            <td><img src="{{ secure_asset($user->picture) }}" alt="{{ $user->firstName }} {{ $user->lastName }}"
               class="rounded-circle" style="width: 50px; height: 50px;"></td>
            <td>{{ $user->firstName }} {{ $user->lastName }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->sigla }}</td>
            <td>
              @if(!$user->ativo)
                  <span class="badge bg-label-dark me-1">Blocked 🚫</span>
              @elseif($user->admin == 2)
                  <span class="badge bg-label-warning me-1">Admin</span>
              @elseif($user->admin == 1)
                  <span class="badge bg-label-info me-1">Manager</span>
              @else
                  <span class="badge bg-label-primary">Pentester</span>
              @endif
            </td>
            <td>{{ $user->role }}</td>
            <td><div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
              data-bs-toggle="dropdown"data-user-id="{{ $user->id }}">
                <i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">

                {{-- route to view selected user profile --}}
                <a class="dropdown-item" href="{{ route('user.profile', ['id' => $user->id]) }}"
                data-bs-toggle="tooltip" aria-label="View User Profile"
                data-bs-original-title="View User Profile" aria-describedby="tooltip674202">
                <i class="bx bx-show-alt me-1" title="View Profile"></i> View</a>

                {{-- form to handle the FORCED PASSWORD CHANGE --}}
                <form method="POST" action="{{ route('users.forcePasswordReset', ['user' => $user->id]) }}" id="forcepasswordreset-form-{{ $user->id }}">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="dropdown-item" data-bs-toggle="tooltip"
                           data-bs-original-title="@if($user->force_password_reset == 0) Force password reset @else Already forced! @endif"
                          aria-describedby="tooltip674202"
                          onclick="return confirmpasswordReset()">
                      @if ($user->force_password_reset == 0)
                          <i class="bx bx-lock me-1"></i> Password
                      @else
                          <i class="bx bx-lock-open-alt me-1"></i> Already Forced!
                      @endif
                  </button>
                  <input type="hidden" name="ativo" value="0">
              </form>

                {{-- form to handle the BLOCK --}}
                <form method="POST" action="{{ route('users.block', ['user' => $user->id]) }}" id="block-form-{{ $user->id }}">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="dropdown-item" data-bs-toggle="tooltip"
                           data-bs-original-title="@if($user->ativo == 1) Block user @else Unblock User @endif"
                          aria-describedby="tooltip674202"
                          onclick="return confirmBlock()">
                      @if ($user->ativo == 1)
                          <i class="bx bx-block me-1"></i> Block
                      @else
                          <i class="bx bx-lock-open-alt me-1"></i> Unblock
                      @endif
                  </button>
                  <input type="hidden" name="ativo" value="0">
              </form>

                {{-- form to handle the DELETE --}}
                <a class="dropdown-item" href="#"  data-bs-toggle="tooltip"
                data-bs-original-title="Delete user"
                aria-describedby="tooltip674202"
                onclick="event.preventDefault();
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
        <script src="{{ secure_asset('assets/js/table-sort.js') }}"></script>
      </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
    {{ $users->links('pagination::bootstrap-4') }}
    </div>
  </div>
</div>
<!--/ Bootstrap Dark Table -->
<!-- Script to open modal if there are any validation errors on submitting new user -->
  @if ($errors->any())
    <script>
        $(document).ready(function(){
            $('#modalCenter').modal('show');
        });
    </script>
  @endif

@endsection
