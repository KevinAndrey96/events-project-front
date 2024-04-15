<?php

namespace App\Repositories\Contracts\Events;

interface EventRepositoryInterface
{
    public function getAll(string $name);
    public function changeStatus($pk, $sk, $status): bool;
    public function getAttendeesByEvent($eventID);

    public function changePayStatus($pk, $sk, $status);
}
