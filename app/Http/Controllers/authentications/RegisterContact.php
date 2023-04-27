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
          'name' => ['required', 'string', 'max:50'],
          'title' => ['nullable', 'string', 'max:25'],
          'email' => ['required', 'email'],
          'phone' => ['nullable', 'numeric']
      ]);

      if ($validator->fails()) {
          return redirect()->back()
              ->withInput()
              ->withErrors($validator);
              // ->with('failed', 'Validation failed: ' . $validator->errors()->first());
      }


      // create the contact
    $attributes['client_id'] = $request->input('client_id');
    $attributes['name'] = $request->input('name');
    $attributes['title'] = $request->input('title') ?? 'Not provided';
    $attributes['email'] = $request->input('email');
    $attributes['phone'] = $request->input('phone') ?? 'Not provided';

    $contact = Contact::create($attributes);

    return redirect()->back()->with('success', 'New contact added.');
}
}
