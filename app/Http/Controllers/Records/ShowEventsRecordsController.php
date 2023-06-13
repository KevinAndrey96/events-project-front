<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Events\EventRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ShowEventsRecordsController extends Controller
{
    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function __invoke()
    {
        $events = $this->eventRepository->getAll('EVENT');

        return view('users.events', ['events' => $events]);
    }
}
