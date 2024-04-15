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
            "pk" => "Event#".substr(''.Uuid::generate(), 0, 6),
            "sk" => "METADATA#EVENT",
            "capacity" => strval($request->input('capacity')),
            "date" => strval($request->input('date')),
            "hour" => strval($request->input('hour')),
            "name" => strval($request->input('name')),
            "price" => strval($request->input('price')),
            "status" => 'enabled',
            "bank" => strval($request->input('bank')),
            "account" => strval($request->input('account'))
        ];

        json_encode($data);

        $client = new Client();
        $response = $client->post(strval(getenv('URL_CREATE_EVENTS')), [
            'json' => $data,
        ]);

        return redirect()->route('events.index')->with('eventRegistered', 'Evento registrado');
    }
}
