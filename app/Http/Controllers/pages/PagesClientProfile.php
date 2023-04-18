<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class PagesClientProfile extends Controller
{
  public function index()
  {
    return view('content.pages.page-client-profile');
  }

  public function showClientProfile($id)
{
    $client = Client::findOrFail($id);

    return view('content.pages.page-client-profile', [
        'client' => $client
    ]);
}

}
