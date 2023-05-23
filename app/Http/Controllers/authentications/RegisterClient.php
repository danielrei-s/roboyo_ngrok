<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class RegisterClient extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-client'); //Route for this in web.php ->auth->@index
  }

  //função de criar client
  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'name' => ['required', 'string', 'max:50'],
          'tin' => ['required', 'numeric', 'digits:9', 'unique:clients,tin'],
          'address' => ['nullable', 'string', 'max: 50'],
          'phone' => ['nullable', 'regex:/^[\d-]{0,25}$/'],
          'picture' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
          'contact_name' => ['nullable', 'string', 'max:50'],
          'contact_email' => ['nullable', 'email', 'max:50'],
          'contact_title' => ['nullable', 'string', 'max:25'],
          'contact_phone' => ['nullable', 'numeric', 'max:10'],
      ]);

      if ($validator->fails()) {
          return redirect()->back()
              ->withInput()
              ->withErrors($validator);
              // ->with('failed', 'Validation failed: ' . $validator->errors()->first());
      }

      // handle picture upload
      if ($request->hasFile('picture')) {
          $picture = $request->file('picture');
          $filename = time() . '_' . $picture->getClientOriginalName();
          $path = 'assets/img/clients/';
          $picture->move($path, $filename);
          $attributes['logo'] = $path . $filename;
      } else {
          $attributes['logo'] = 'assets/img/clients/sonae.jpg';
      }

      // generate the code attribute with an incrementing number
    $lastClient = Client::orderBy('id', 'desc')->first(); // get the last client record
    $lastNumber = $lastClient ? intval(substr($lastClient->code, 5)) : 0; // extract the number from its code attribute
    $nextNumber = $lastNumber + 1; // increment the number
    $codeNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT); // format the number with leading zeros

    $attributes['code'] = 'RSC: ' . $codeNumber; // concatenate the prefix and the formatted number
      // create the user
    $attributes['name'] = $request->input('name');
    $attributes['tin'] = $request->input('tin');
    $attributes['address'] = $request->input('address') ?? 'Not provided';
    $attributes['phone'] = $request->input('phone') ?? 'Not provided';

    $client = Client::create($attributes);

      // create the user contact
      if ($request->filled('contact_name')) {
        $contact_attributes['contact_name'] = $request->input('contact_name');
        $contact_attributes['contact_email'] = $request->input('contact_email') ?? 'Not provided';
        $contact_attributes['contact_title'] = $request->input('contact_title') ?? 'Not provided';
        $contact_attributes['contact_phone'] = $request->input('contact_phone') ?? 'Not provided';
        $contact_attributes['client_id'] = $client->id;
        $contact = Contact::create($contact_attributes);
      }

      //Generate client URL to display after creation
      $profileUrl = 'client/' . $client->id;
    return redirect($profileUrl)->with('success', 'Client ' . $attributes['name'] . ' added.');
}
}
