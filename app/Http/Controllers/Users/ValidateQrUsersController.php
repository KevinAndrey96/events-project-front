<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Events\EventRepositoryInterface;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\UsesCases\Contracts\Events\GetAllEventsUseCaseInterface;
use App\UsesCases\Contracts\Users\ValidateQRUsersUseCaseInterface;
use Illuminate\Http\Request;

class ValidateQrUsersController extends Controller
{
    private ValidateQRUsersUseCaseInterface $validateQRUsersUseCase;
    private EventRepositoryInterface $eventRepository;

    public function __construct(ValidateQRUsersUseCaseInterface $validateQRUsersUseCase, EventRepositoryInterface $eventRepository)
    {
        $this->validateQRUsersUseCase = $validateQRUsersUseCase;
        $this->eventRepository = $eventRepository;
    }

    public function __invoke(Request $request)
    {
        $user = $this->validateQRUsersUseCase->handle($request->input('qr-message'));

        if (isset($user)) {
            $this->eventRepository->changeStatus(
                $user['pk'],
                $user['sk'],
                'attend'
            );
        }

        return view('users.validationQR', ['user' => $user]);
    }
}
