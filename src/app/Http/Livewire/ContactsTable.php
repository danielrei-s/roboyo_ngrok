<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;

// class ContactsTable extends Component
// {
//     use WithPagination;

//     public $sortBy = 'name';
//     public $sortDirection = 'asc';
//     public $search = '';

//     public function render()
// {
//     $contacts = Contact::where('client_id', $this->client_id)
//         ->where('name', 'like', '%' . $this->search . '%')
//         ->orderBy($this->sortBy, $this->sortDirection)
//         ->paginate(3);

//     return view('livewire.contacts-table', [
//         'contacts' => $contacts
//     ]);
// }

// public $client_id;

// public function mount($client_id)
// {
//     $this->client_id = $client_id;
// }



//     public function sortBy($field)
//     {
//         if ($this->sortBy === $field) {
//             $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
//         } else {
//             $this->sortDirection = 'asc';
//         }

//         $this->sortBy = $field;
//     }
// }



