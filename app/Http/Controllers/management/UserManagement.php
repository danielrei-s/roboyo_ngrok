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
            'ativo' => $user->ativo
        ];
    }

    return view('content.management.user-management', ['users' => $users])->with('userObjects', $userObjects);
  }

  public function destroy($id)
{
  $usersWithAdminTwo = User::where('admin', 2)->get();
  $user = User::findOrFail($id);

  // Check if there are less than 2 users with admin=2 AND the user being deleted is an admin=2
  if ($usersWithAdminTwo->count() < 2 && $user->admin == 2) {
      return back()->with('failed', 'Cannot delete this Admin, at least two users must be Admins.');
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

    $user = User::findOrFail($userId);
    $user->ativo = $user->ativo == 1 ? 0 : 1;
    $user->save();

    // Redirect the user back to the view with a success message
    $successMessage = $user->ativo == 1 ? 'User has been unblocked.' : 'User has been blocked.';
    return redirect()->back()->with('success', $successMessage);
  }
}
