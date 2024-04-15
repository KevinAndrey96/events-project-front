<?php

namespace App\Http\Controllers\Attendee;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Events\EventRepositoryInterface;
use App\UsesCases\Contracts\Users\ValidateQRUsersUseCaseInterface;
use Illuminate\Http\Request;

class ChangePayStatusController extends Controller
{
    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function __invoke(Request $request)
    {
        $this->eventRepository->changePayStatus($request->pk, $request->sk, $request->isPayed);

        return back();
    }
}
