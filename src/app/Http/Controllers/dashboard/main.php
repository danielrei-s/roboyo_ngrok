<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class Main extends Controller
{
  public function index()
  {
    return view('content.dashboard.dashboards-main'); //New controler for new page, check web.php for route
  }

  public function edit(Request $request)
  {
    $user = Auth::user();

      $validator = Validator::make($request->all(), [
          'firstname' => ['required', 'max:25'],
          'lastname' => ['required', 'max:25'],
          'sigla' => ['required', 'max:3', Rule::unique('users')->ignore($user)],
          'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
          'role' => ['required', 'max:25'],
          'phone' => ['numeric', 'digits_between:9,15'],
          'picture' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
      ]);

    // get all users with admin set to 2
    $usersWithAdminTwo = User::where('admin', 2)->get();
    // remove users with ativo set to 0
    $usersWithAdminTwo = $usersWithAdminTwo->reject(function ($user) {
        return $user->ativo == 0;
    });
    // Check if there are less than 2 users with admin=2 AND the user being deleted is an admin=2
    if ($usersWithAdminTwo->count() < 2 && $user->admin == 2) {
        return back()->with('warning', 'Cannot edit this Admin, at least two users must be active Admins to proceed.');
    }

    // validation
    if ($validator->fails()) {
      return redirect()->back()
        ->withInput()
        ->withErrors($validator)
        ->with('failed', 'Validation failed: ' . $validator->errors()->first());
    }

      //handle picture
      if ($request->hasFile('picture')) {
        $picture = $request->file('picture');
        $filename = time() . '_' . $picture->getClientOriginalName();
        $path = 'assets/img/avatars/';
        $picture->move($path, $filename);
        $pic = $path . $filename;
        $user->picture = $pic;
      }

      // Update the user's information
      $user->firstname = $request->input('firstname');
      $user->lastname = $request->input('lastname');
      $user->sigla = $request->input('sigla');
      $user->email = $request->input('email');
      $user->role = $request->input('role');
      $user->phone = $request->input('phone');
      $user->save();

      return redirect()->back()->with('success', 'Your account have been updated, ' . $user->firstName);
  }
}
