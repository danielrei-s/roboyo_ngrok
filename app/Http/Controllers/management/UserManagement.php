<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserManagement extends Controller
{
  public function index()
  {
    $users = User::all();

    $userObjects = [];

    foreach ($users as $user) {
        $userObjects[] = (object)[
            'id' => $user->id,
            'picture' => $user->picture,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' => $user->email,
            'sigla' => $user->sigla,
            'admin' => $user->admin,
            'manager' => $user->manager,
            'role' => $user->role
        ];
    }

    return view('content.management.user-management')->with('userObjects', $userObjects);
  }

  public function destroy($id)
  {
      $user = User::findOrFail($id);
      $user->delete();

      return redirect()->route('user-management')->with('success', 'User has been deleted successfully!');
  }

  public function blockUser(Request $request, $id)
{
    $user = User::find($id);
    $user->ativo = $request->input('ativo');
    $user->save();

    // Redirect the user back to the view with a success message
    return redirect()->back()->with('success', 'User has been blocked.');
}


}
