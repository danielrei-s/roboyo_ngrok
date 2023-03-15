<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic'); //Route for this in web.php ->auth->@index
  }

  
}
