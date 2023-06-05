<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class StoreRecordsController extends Controller
{
    public function __invoke(Request $request)
    {
        //return $request;
        $data = [
            "pk" => "User#".Uuid::generate(),
            "sk" => "METADATA#USER",
            "eventID" => strval($request->input('event-pk')),
            "name" => strval($request->input('first_name')),
            "lastname" => strval($request->input('last_name')),
            "gender" => strval($request->input('gender')),
            "email" => strval($request->input('email')),
            "phone" => strval($request->input('phone')),
            "date" => strval($request->input('date')),
            "status" => 'attends'
        ];

        json_encode($data);

        $client = new Client();
        $response = $client->post(strval(getenv('URL_CREATE_EVENTS')), [
            'json' => $data,
        ]);

        return redirect()->route('records.events')->with('recordRegistered', 'Ha sido registrado al evento');


    }
}
