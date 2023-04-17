<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;


class ClientManagement extends Controller
{
  public function index()
  {
    $clients = Client::paginate(6);

    $clientObjects = [];

    foreach ($clients as $client) {
        $clientObjects[] = (object)[
            'id' => $client->id,
            'logo' => $client->logo,
            'name' => $client->name,
            'tin' => $client->tin,
            'code' => $client->code,
            'address' => $client->address,
            'phone' => $client->phone,
            'created_at' => $client->created_at,
            'updated_at' => $client->updated_at
        ];
    }

    return view('content.management.client-management', ['clients' => $clients])->with('clientObjects', $clientObjects);
  }


}
