{{-- <div>
  <div class="d-flex align-items-center">
      <input type="text" wire:model="search" placeholder="Search contacts by name..." class="form-control">
      <div class="dropdown ml-2">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="sort-by" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort by {{ ucfirst($sortBy) }}
          </button>
          <div class="dropdown-menu" aria-labelledby="sort-by">
              <a class="dropdown-item" href="#" wire:click.prevent="sortBy('name')">Name</a>
              <a class="dropdown-item" href="#" wire:click.prevent="sortBy('email')">Email</a>
              <a class="dropdown-item" href="#" wire:click.prevent="sortBy('title')">Title</a>
              <a class="dropdown-item" href="#" wire:click.prevent="sortBy('phone')">Phone</a>
          </div>
      </div>
  </div>

  <table class="table table-bordered table-sm" data-page="{{ $contacts->currentPage() }}" data-page-size="3" data-current-page="{{ $contacts->currentPage() }}">
      <thead>
          <tr>
              <th class="sortable {{ $sortBy === 'name' ? 'sort-' . $sortDirection : '' }}" data-sort-by="name">Name</th>
              <th class="sortable {{ $sortBy === 'email' ? 'sort-' . $sortDirection : '' }}" data-sort-by="email">Email</th>
              <th class="sortable {{ $sortBy === 'title' ? 'sort-' . $sortDirection : '' }}" data-sort-by="title">Title</th>
              <th class="sortable {{ $sortBy === 'phone' ? 'sort-' . $sortDirection : '' }}" data-sort-by="phone">Phone</th>
          </tr>
      </thead>
      <tbody class="table-border-bottom-0" id="contacts-table">
          @foreach ($contacts as $contact)
          <tr>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->email }}</td>
              <td>{{ $contact->title }}</td>
              <td>{{ $contact->phone }}</td>
          </tr>
          @endforeach
      </tbody>
  </table>

  <div class="d-flex justify-content-center align-items-center mt-3">
      {{ $contacts->links() }}
  </div>

</div> --}}
