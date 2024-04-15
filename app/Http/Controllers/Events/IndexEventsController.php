<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Events\EventRepositoryInterface;
use App\UsesCases\Contracts\Events\GetAllEventsUseCaseInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IndexEventsController extends Controller
{
    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function __invoke()
    {
        $events = $this->eventRepository->getAll('EVENT');
        //return $events;

        return view('events.index', ['events' => $events]);
    }
}
