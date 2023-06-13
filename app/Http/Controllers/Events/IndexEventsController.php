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

    public function __invoke(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $events = $this->eventRepository->getAll('EVENT');

        return view('events.index', ['events' => $events]);
    }
}
