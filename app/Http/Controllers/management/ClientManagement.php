<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class ClientManagement extends Controller
{
  public function index()
  {
    return view('content.management.client-management');  //new controler for new pages, check route in web.php
  }

  
}