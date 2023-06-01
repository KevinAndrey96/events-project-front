<?php

namespace App\Http\Controllers\Events;
use Webpatser\Uuid\Uuid;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreEventsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            "pk" => "Event#".Uuid::generate(),
            "sk" => "METADATA#EVENT",
            "capacity" => strval($request->input('capacity')),
            "date" => strval($request->input('date')),
            "hour" => strval($request->input('hour')),
            "name" => strval($request->input('name')),
            "status" => 'enabled'
        ];

        json_encode($data);

        $client = new Client();
        $response = $client->post(strval(getenv('URL_CREATE_EVENTS')), [
            'json' => $data,
        ]);

        return redirect()->route('events.index')->with('eventRegistered', 'Evento registrado');
    }
}
