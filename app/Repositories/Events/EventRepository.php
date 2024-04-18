<?php

namespace App\Repositories\Events;

use App\Repositories\Contracts\Events\EventRepositoryInterface;
use GuzzleHttp\Client;

class EventRepository implements EventRepositoryInterface
{
    public function getAll(string $name)
    {
        $client = new Client();
        $url = strval(getenv('URL_SHOW_EVENTS_USERS').'?param='.$name);
        $response = $client->get($url);

        return json_decode($response->getBody(), true);
    }

    public function changeStatus($pk, $sk, $status): bool
    {
        $data = [
            'pk' => $pk,
            'sk' => $sk,
            'status' => $status
        ];

        json_encode($data);

        $client = new Client();
        $client->post(strval(getenv('URL_CHANGE_STATUS_USERS_EVENTS')), [
            'json' => $data
        ]);

        return true;
    }

    public function getAttendeesByEvent($eventID)
    {
        $client = new Client();
        $url = strval(getenv('URL_EVENT_USERS').'?param='.$eventID);
        $response = $client->get($url);

        return json_decode($response->getBody(), true);
    }

    public function changePayStatus($pk, $sk, $status)
    {
        $data = [
            'pk' => $pk,
            'sk' => $sk,
            'status' => $status
        ];

        json_encode($data);

        $client = new Client();
        $client->post(strval(getenv('URL_CHANGE_PAY_STATUS')), [
            'timeout' => 100000,
            'json' => $data
        ]);

        return true;
    }
}
