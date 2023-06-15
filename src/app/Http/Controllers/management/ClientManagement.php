<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

class ClientManagement extends Controller
{
    public function index()
  {
      // CLIENT & CLIENT OBJECTS
      $clients = Client::paginate(6);
      $clientObjects = $this->getClientObjects($clients);

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
      $client = Client::findOrFail($id);

      // Delete client
      $client->delete();

      if (Route::currentRouteName() === 'client-management') {   //delete inside client management
          return back()->with('success', 'Client has been deleted successfully!');
      } else {
          $clients = Client::paginate(6);
          $clientObjects = $this->getClientObjects($clients);

          return redirect()->route('client-management')  //delete inside client profile, redirecting to client management
                ->with('clientObjects', $clientObjects)
                ->with('success', 'Client has been deleted successfully!');
      }
  }

  private function getClientObjects($clients)  //needed in order to return destroy both with data and flash message
  {
      $clientObjects = [];

      foreach ($clients as $client) {
          $clientObjects[] = (object)[
              'id' => $client->id,
              'logo' => $client->logo,
              'name' => $client->name,
              'tin' => $client->tin,
              'code' => $client->code,
              'address' => $client->address,
              'phone' => $client->phone,
              'created_at' => $client->created_at,
              'updated_at' => $client->updated_at
          ];
      }

      return $clientObjects;
  }

  private function getContactsObjects($contacts)  //needed in order to return destroy both with data and flash message
  {
      $contactObjects = [];

      foreach ($contacts as $contact) {
          $contactObjects[] = (object)[
              'id' => $contact->id,
              'name' => $contact->name,
              'title' => $contact->title,
              'email' => $contact->email,
              'phone' => $contact->phone,
              'created_at' => $contact->created_at,
              'updated_at' => $contact->updated_at
          ];
      }

      return $contactObjects;
  }

}


