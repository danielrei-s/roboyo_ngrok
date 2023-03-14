<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserManagement extends Controller
{
  public function index()
  {
    return view('content.management.user-management');
  }

  
}