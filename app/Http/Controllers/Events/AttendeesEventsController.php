<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Events\EventRepositoryInterface;
use Illuminate\Http\Request;

class AttendeesEventsController extends Controller
{
    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function __invoke($id)
    {
        $attendees =  $this->eventRepository->getAttendeesByEvent($id);

        return view('events.attendees', ['attendees' => $attendees]);
    }
}
