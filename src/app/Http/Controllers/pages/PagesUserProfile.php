<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PagesUserProfile extends Controller
{
  public function index()
  {
    return view('content.pages.pages-user-profile');
  }

  public function showUserProfile($id)
{
    $user = User::findOrFail($id);

    return view('content.pages.pages-user-profile', [
        'user' => $user
    ]);
}

}
