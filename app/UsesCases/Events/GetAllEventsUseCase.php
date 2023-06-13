<?php

namespace App\UsesCases\Events;

use App\UsesCases\Contracts\Events\GetAllEventsUseCaseInterface;
use GuzzleHttp\Client;

class GetAllEventsUseCase implements GetAllEventsUseCaseInterface
{
    public function handle(string $name)
    {
        $client = new Client();
        $url = strval(getenv('URL_SHOW_EVENTS_USERS').'?param='.$name);
        $response = $client->get($url);

        return json_decode($response->getBody(), true);
    }
}
