<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

  class SessionsController extends Controller
  {
    public function destroy()
    {
      auth()->logout();

      return redirect('/')->with('success', 'Logged out!'); #Loggout
    }

    public function login()
    {
      $attributes = request()->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
    ],
    [
        'email.exists' => 'The provided credentials are invalid.',
        'email.required' => 'The email or password field is required.',
    ]);

    if (auth()->attempt($attributes)) {
        $user = auth()->user();
        if (!$user->ativo) {
            auth()->logout(); // logout the user if inactive
            return back()
                ->withInput()
                ->withErrors(['failed' => 'Your account has been blocked by an Admin.']);
          } elseif ($user->force_password_reset) {
            return redirect()->route('auth-force-password-reset')
              ->with('warning', 'Forced to change password by Admin.');
        } else {
            return redirect('/')
              ->with('success', 'Welcome back ' . $user->firstName . ". ");
        }
    }

    return back()
        ->withInput()
        ->withErrors([
            'email' => 'The email or password field is required.',
            'password' => 'The email or password field is required.',
        ]);


      # Validar request, autenticar utilizador e dar login (com base no request) e flashar messagem de sucesso.
    }

    public function changePassword(Request $request)
    {
      $user = Auth::user();

      $validatedData = $request->validate([
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8|confirmed',
      ]);
      if (!\Hash::check($validatedData['currentPassword'], $user->password)) {
        return back()->withErrors(['currentPassword' => 'The current password you entered is incorrect.'])->withInput();
      }

      // $user->password = bcrypt($validatedData['newPassword']);  //double hash....
      $user->password = $validatedData['newPassword'];
      $user->save();

      return redirect()->route('dashboard-main')->with('success', 'Your password has been updated.');
    }
  }
