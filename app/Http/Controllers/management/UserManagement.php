<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserManagement extends Controller
{
  public function index()
  {
    $users = User::paginate(6);  //loaded with users => $users

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
            'ativo' => $user->ativo,
            'contact' => $user->contact,
            'force_password_reset' => $user->force_password_reset,
        ];
    }

    return view('content.management.user-management', ['users' => $users])->with('userObjects', $userObjects);
  }

  public function destroy($id)
{
  // get all users with admin set to 2
  $usersWithAdminTwo = User::where('admin', 2)->get();

  // remove users with ativo set to 0
  $usersWithAdminTwo = $usersWithAdminTwo->reject(function ($user) {
      return $user->ativo == 0;
  });

  $user = User::findOrFail($id);

  // Check if there are less than 2 users with admin=2 AND the user being deleted is an admin=2
  if ($usersWithAdminTwo->count() < 2 && $user->admin == 2) {
      return back()->with('failed', 'Cannot delete this Admin, at least one Admin active proceed.');
  }

  // Delete the user
  $user->delete();
  return back()->with('success', 'User has been deleted successfully!');

}

  public function blockUser(Request $request, $user)
  {
    $userId = intval($user);

    if ($userId <= 0) {
      abort(404); // or handle the error in some other way
    }

    $usersWithAdminTwo = User::where('admin', 2)->get();
    $user = User::findOrFail($userId);
    // remove users with ativo set to 0
    $usersWithAdminTwo = $usersWithAdminTwo->reject(function ($user) {
      return $user->ativo == 0;
    });

    if ($usersWithAdminTwo->count() < 2 && $user->admin == 2) {  //check if current selected user is admin and there are 2 or admins before proceeding.
      if ($user->ativo == 0){  //this makes sure to always be allowed to unblocked no matter how many admins, but blocking remains with restrictions
        $user->ativo = 1;
        $user->save();
        return redirect()->back()->with('success', 'User has been unblocked');
      }
      return back()->with('failed', 'Cannot block this Admin, at least one Admin must be active to proceed.');
    }

    $user->ativo = $user->ativo == 1 ? 0 : 1;
    $user->save();

    // Redirect the user back to the view with a success message
    $successMessage = $user->ativo == 1 ? 'User has been unblocked.' : 'User has been blocked.';
    return redirect()->back()->with('success', $successMessage);
  }

  public function forcePasswordReset(Request $request, $user)
  {
    $userId = intval($user);

    if ($userId <= 0) {
      abort(404); // or handle the error in some other way
    }

    $user = User::findOrFail($userId);

    if ($user->force_password_reset == 1) {
      return redirect()->back()->with('failed', 'Waiting for user to change password');
    }else{
      $user->force_password_reset = 1;
      $user->save();
      return redirect()->back()->with('success', 'Sent request for user to change password');
    }
  }
}
