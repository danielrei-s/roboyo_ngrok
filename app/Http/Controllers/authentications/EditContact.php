<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditContact extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-contact-basic'); //Not used, copied
  }

  //função de criar contact
  public function edit(Request $request)
  {
    $contact = Contact::findOrFail($request->input('contact_id'));

      $validator = Validator::make($request->all(), [
          'contact_name' => ['nullable', 'string', 'max:50'],
          'contact_email' => ['required', 'email', 'unique:contacts,contact_email'],
          'contact_title' => ['nullable', 'string'],
          'contact_phone' => ['nullable', 'numeric', 'max: 9']
      ]);


    // validation
    if ($validator->fails()) {
      return redirect()->back()
        ->withInput()
        ->withErrors($validator);
        // ->with('failed', 'Validation failed: ' . $validator->errors()->first());
    }


      // Update the user's information
      $contact->contact_name = $request->input('contact_name');
      $contact->contact_email = $request->input('contact_email');
      $contact->contact_title = $request->input('contact_title');
      $contact->contact_phone = $request->input('contact_phone');

      $contact->save();

      return redirect()->back()->with('success', 'Contact updated for ' . $contact->contact_email);
  }

}
