<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }

  //função de criar user
  public function store()
  {
   // create the user
   $attributes = request()->validate([
    'firstname' => ['required', 'max:25'],
    'lastname' => ['required', 'max:25'],
    'sigla' => ['required', 'unique:users,sigla', 'max:3'],
    'email' => ['required', 'email', 'unique:users,email'],
    'password' => ['required', 'min: 7', 'max:255'],
    ]);

    // Set default values for admin and manager attributes
    $attributes['admin'] = 0;
    $attributes['manager'] = 0;
    $attributes['picture'] = 'img/avatars/5.png';

   $user = User::create($attributes);
   
   auth()->login($user);
   
   return redirect('/')->with('success', 'Your account has been created!');

  }
}
