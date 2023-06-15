<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

class ContactManagement extends Controller
{
    public function edit()
  {
      // CLIENT & CLIENT OBJECTS
      $clients = Contact::paginate(6);
      $clientObjects = $this->getContactObjects($clients);

      // CONTACT & CONTACT OBJECTS
      $contacts = Contact::paginate(4);
      $contactObjects = $this->getContactsObjects($contacts);

    // Teste output
    //  dd($contactObjects);
    //  dd($contacts);

      return view('content.management.client-management', ['clients' => $clients])
            ->with('clientObjects', $clientObjects)
            ->with('contactObjects', $contactObjects);
  }

  public function destroy($id)
  {
    $contact = Contact::findOrFail($id);

    // Delete contact
    $contact->delete();

    return redirect()->back()->with('success', 'Contact has been deleted successfully!');
  }
}
