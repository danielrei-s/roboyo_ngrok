<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic'); //Route for this in web.php ->auth->@index
  }

  //função de criar user
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'firstname' => ['required', 'max:25'],
      'lastname' => ['required', 'max:25'],
      'sigla' => ['required', 'unique:users,sigla', 'max:3'],
      'email' => ['required', 'email', 'unique:users,email'],
      'password' => ['required', 'min: 7', 'max:255'],
  ]);

  if ($validator->fails()) {
      return redirect()->back()
          ->withInput()
          ->withErrors($validator)
          ->with('failed', 'Validation failed: ' . $validator->errors()->first());
  }

  // create the user
  $attributes = $request->all();
  $attributes['admin'] = 0;
  $attributes['manager'] = 0;
  $attributes['picture'] = 'assets/img/avatars/5.png';

  $user = User::create($attributes);

  return redirect('user-management')->with('success', 'Account created for ' . $attributes['email']);
  }
}
