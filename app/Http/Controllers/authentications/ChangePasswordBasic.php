<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-change-password-basic');  //Route for this in web.php ->auth->@index
  }
}
