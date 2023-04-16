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
          'role' => ['required', 'max:25'],
          'admin' => ['required', 'in:0,1,2'],
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
          $path = 'assets/img/avatars/';
          $picture->move($path, $filename);
          $attributes['picture'] = $path . $filename;
      } else {
          $attributes['picture'] = 'assets/img/avatars/4.png';
      }

      // create the user
      $attributes['firstname'] = $request->input('firstname');
      $attributes['lastname'] = $request->input('lastname');
      $attributes['password'] = '12345';
      $admin = $request->input('admin', 0);
      $attributes['admin'] = in_array($admin, [0, 1, 2]) ? $admin : 0;
      $attributes['sigla'] = $request->input('sigla');
      $attributes['role'] = $request->input('role');
      $attributes['email'] = $request->input('email');
      $attributes['force_password_reset'] = 1;  // this makes the user change its password after first login
      $user = User::create($attributes);

      return redirect('user-management')->with('success', 'Account created for ' . $attributes['email']);
  }
}
