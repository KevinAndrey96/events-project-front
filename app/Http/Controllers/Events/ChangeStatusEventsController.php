<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Events\EventRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChangeStatusEventsController extends Controller
{
    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function __invoke(Request $request)
    {
        $this->eventRepository->changeStatus(
            $request->input('pk'),
            $request->input('sk'),
            $request->input('status'));

        return back();
    }
}
