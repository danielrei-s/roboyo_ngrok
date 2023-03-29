<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class ClientManagement extends Controller
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
            'role' => $user->role,
            'ativo' => $user->ativo
        ];
    }

    return view('content.management.client-management')->with('userObjects', $userObjects);  //new controler for new pages, check route in web.php
  }


}
