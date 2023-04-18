<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class RegisterClient extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic'); //Route for this in web.php ->auth->@index
  }

  //função de criar client
  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'name' => ['required', 'string', 'max:50'],
          'tin' => ['required', 'numeric', 'digits:9', 'unique:clients,tin'],
          'address' => ['nullable', 'string', 'max: 50'],
          'phone' => ['nullable', 'regex:/^[\d-]{0,25}$/'],
          'picture' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
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

      // create the user
    $attributes['name'] = $request->input('name');
    $attributes['tin'] = $request->input('tin');
    $attributes['address'] = $request->input('address');
    $attributes['phone'] = $request->input('phone');

      // generate the code attribute with an incrementing number
    $lastClient = Client::orderBy('id', 'desc')->first(); // get the last client record
    $lastNumber = $lastClient ? intval(substr($lastClient->code, 5)) : 0; // extract the number from its code attribute
    $nextNumber = $lastNumber + 1; // increment the number
    $codeNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT); // format the number with leading zeros
    $attributes['code'] = 'RSC: ' . $codeNumber; // concatenate the prefix and the formatted number

    $client = Client::create($attributes);

    return redirect('client-management')->with('success', 'Client ' . $attributes['name'] . ' added.');
}
}
