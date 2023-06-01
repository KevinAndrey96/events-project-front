<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CancelEventsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'pk' => $request->input('pk'),
            'sk' => $request->input('sk')
        ];

        json_encode($data);

        $client = new Client();

        $client->post(strval(getenv('URL_CANCEL_EVENTS')), [
                'json' => $data
        ]);

        return back();
    }
}
