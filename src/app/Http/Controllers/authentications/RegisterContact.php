<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class RegisterContact extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-contact-basic'); //Route for this in web.php ->auth->@index
  }

  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'client_id' => ['required', 'string'],
          'contact_name' => ['nullable', 'string', 'max:50'],
          'contact_title' => ['nullable', 'string', 'max:25'],
          'contact_email' => ['required', 'email'],
          'contact_phone' => ['nullable', 'numeric']
      ]);

      if ($validator->fails()) {
          return redirect()->back()
              ->withInput()
              ->withErrors($validator);
              // ->with('failed', 'Validation failed: ' . $validator->errors()->first());
      }


      // create the contact
    $attributes['client_id'] = $request->input('client_id');
    $attributes['contact_name'] = $request->input('contact_name') ?? 'Not provided';
    $attributes['contact_title'] = $request->input('contact_title') ?? 'Not provided';
    $attributes['contact_email'] = $request->input('contact_email');
    $attributes['contact_phone'] = $request->input('contact_phone') ?? 'Not provided';

    $contact = Contact::create($attributes);

    return redirect()->back()->with('success', 'New contact added.');
}
}
