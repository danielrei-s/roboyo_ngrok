<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditClient extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic'); //Not used, copied
  }

  //função de criar client
  public function edit(Request $request)
{
  $client = Client::findOrFail($request->input('client_id'));

    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:50'],
        'tin' => ['required', 'numeric', 'digits:9', Rule::unique('clients')->ignore($client)],
        'phone' => ['nullable', 'regex:/^[\d-]{0,25}$/'],
        'address' => ['nullable', 'string', 'max: 50'],
        'picture' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
    ]);


  // validation
  if ($validator->fails()) {
    return redirect()->back()
      ->withInput()
      ->withErrors($validator);
      // ->with('failed', 'Validation failed: ' . $validator->errors()->first());
  }

    //handle picture
    if ($request->hasFile('picture')) {
      $picture = $request->file('picture');
      $filename = time() . '_' . $picture->getClientOriginalName();
      $path = 'assets/img/clients/';
      $picture->move($path, $filename);
      $pic = $path . $filename;
      $client->logo = $pic;
    }

    // Update the user's information
    $client->name = $request->input('name');
    $client->tin = $request->input('tin');
    $client->phone = $request->input('phone');
    $client->address = $request->input('address');
    $client->save();

    return redirect()->back()->with('success', 'Account updated for ' . $client->name);
}

}
