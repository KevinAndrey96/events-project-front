<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IndexEventsController extends Controller
{
    public function __invoke()
    {
        $client = new Client();
        $response = $client->get(strval(getenv('URL_SHOW_EVENTS')));

        $events = json_decode($response->getBody(), true);

        return view('events.index', ['events' => $events]);
    }
}
