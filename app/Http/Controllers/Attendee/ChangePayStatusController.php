<?php

namespace App\Http\Controllers\Attendee;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Events\EventRepositoryInterface;
use App\UsesCases\Contracts\Users\ValidateQRUsersUseCaseInterface;
use Exception;
use Illuminate\Http\Client\RequestException;
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
        try {
            $this->eventRepository->changePayStatus($request->pk, $request->sk, $request->isPayed);
            return back();
        } catch (exception $e) {
            return 'Se ha encontrado la siguiente excepción: '.$e;
        }
    }
}
