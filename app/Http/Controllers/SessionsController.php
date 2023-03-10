<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out!'); #apagar login
    }

    public function store()
    {
        $attributes = request()->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
        ]);

        if (auth()->attempt($attributes)){

            return redirect('/')->with('success', 'Welcome Back!');
        }

        return back()
        ->withInput()
        ->withErrors(['email' => 'Provided credentials could not be verified.']);
        
        # Validar request, autenticar utilizador e dar login (com base no request) e flashar messagem de sucesso.
    }
}
