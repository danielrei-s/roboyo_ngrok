<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic'); //Route for this in web.php ->auth->@index
  }

  //função de criar user
  public function edit(Request $request)
{
  $user = User::findOrFail($request->input('user_id'));
    $validator = Validator::make($request->all(), [
        'firstname' => ['required', 'max:25'],
        'lastname' => ['required', 'max:25'],
        'sigla' => ['required', 'max:3', Rule::unique('users')->ignore($user)],
        'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
        'role' => ['required', 'max:25'],
        'admin' => ['required', 'in:0,1,2'],
        'contact' => ['numeric', 'digits_between:9,10'],
        'picture' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
    ]);

    //handle picture

    if ($request->hasFile('picture')) {
      $picture = $request->file('picture');
      $filename = time() . '_' . $picture->getClientOriginalName();
      $path = 'assets/img/avatars/';
      $picture->move($path, $filename);
      $attributes['picture'] = $path . $filename;
    }

    if ($validator->fails()) {
        return redirect()->back()
            ->withInput()
            ->withErrors($validator)
            ->with('failed', 'Validation failed: ' . $validator->errors()->first());
    }

    // Update the user's information
    $user = User::findOrFail($request->input('user_id'));
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->sigla = $request->input('sigla');
    $user->role = $request->input('role');
    $user->email = $request->input('email');
    $user->contact = $request->input('contact');
    $user->save();

    return redirect()->back()->with('success', 'Account updated for ' . $user->email);
}

}
