<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contact;

class PagesClientProfile extends Controller
{
  public function index()
  {
    return view('content.pages.page-client-profile');
  }

      public function showClientProfile($id)
    {
      $client = Client::findOrFail($id);
      $contacts = Contact::where('client_id', $id)->paginate(8); // use paginate() instead of get()

      return view('content.pages.page-client-profile', [
          'client' => $client,
          'contacts' => $contacts
      ]);
    }

}
