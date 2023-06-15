<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ForcePasswordReset extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-reset-password');  //Route for this in web.php ->auth->@index
  }

  public function passwordReset(Request $request)
{
    // Validate the form input
    $validatedData = $request->validate([
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8|confirmed',
    ]);


    // Get the authenticated user
    $user = Auth::user();

    // Check if the current password is correct
    if (!Hash::check($request->currentPassword, $user->password)) {
        return redirect()->back()->withErrors(['currentPassword' => 'The current password you entered is incorrect.']);
    }

    // Set the new password
    $user->password = $validatedData['newPassword'];
    $user->force_password_reset = 0;
    $user->save();

    // Redirect the user with a success message
    auth()->logout();
    return redirect('/auth/login-basic')->with('success', 'Your password has been updated successfully.');
}

}
