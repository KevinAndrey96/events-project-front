<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ShowEventsRecordsController extends Controller
{
    public function __invoke()
    {
        $client = new Client();
        $response = $client->get(strval(getenv('URL_SHOW_EVENTS')));

        $events = json_decode($response->getBody(), true);

        return view('users.events', ['events' => $events]);
    }
}
