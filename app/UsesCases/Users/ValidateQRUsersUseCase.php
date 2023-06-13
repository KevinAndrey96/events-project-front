<?php

namespace App\UsesCases\Users;

use App\Repositories\Contracts\Events\EventRepositoryInterface;
use App\UsesCases\Contracts\Users\ValidateQRUsersUseCaseInterface;

class ValidateQRUsersUseCase implements ValidateQRUsersUseCaseInterface
{
    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function handle(string $qrMessage):bool
    {
        $users = $this->eventRepository->getAll('USER');
        $validatedQR = false;

        foreach ($users as $user) {
            if ($user['pk'] == $qrMessage) {
                $validatedQR = true;
                break;
            }
        }

        return $validatedQR;
    }
}
