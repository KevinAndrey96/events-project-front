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
}
