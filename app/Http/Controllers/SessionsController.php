<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out!'); #Loggout
    }

    public function store()
    {
        $attributes = request()->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
        ]);

        if (auth()->attempt($attributes)){

            return redirect('/')->with('success', 'Welcome back ' . auth()->user()->firstName . ". ");
        }

        return back()
        ->withInput()
        ->withErrors('failed','Provided credentials could not be verified.');

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
