<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserManagement extends Controller
{
  public function index()
  {
    $users = User::paginate(10);  //loaded with users => $users

    $userObjects = [];  //empty array to carry all user info

    foreach ($users as $user) {
        $userObjects[] = (object)[
            'id' => $user->id,
            'picture' => $user->picture,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' => $user->email,
            'sigla' => $user->sigla,
            'admin' => $user->admin,
            'role' => $user->role,
            'ativo' => $user->ativo
        ];
    }

    return view('content.management.user-management', ['users' => $users])->with('userObjects', $userObjects);
  }

  public function destroy($id)
  {
      $user = User::findOrFail($id);
      $user->delete();

      return back()->with('success', 'User has been deleted successfully!');
  }

  public function blockUser(Request $request, $user)
  {
    $userId = intval($user);

    if ($userId <= 0) {
      abort(404); // or handle the error in some other way
    }

    $user = User::findOrFail($userId);
    $user->ativo = $user->ativo == 1 ? 0 : 1;
    $user->save();

    // Redirect the user back to the view with a success message
    $successMessage = $user->ativo == 1 ? 'User has been unblocked.' : 'User has been blocked.';
    return redirect()->back()->with('success', $successMessage);
  }
}
