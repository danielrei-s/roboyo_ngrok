<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Main extends Controller
{
  public function index()
  {
    return view('content.dashboard.dashboards-main'); //New controler for new page, check web.php for route
  }
}