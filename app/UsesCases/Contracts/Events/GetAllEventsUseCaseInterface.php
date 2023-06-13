<?php

namespace App\UsesCases\Contracts\Events;

interface GetAllEventsUseCaseInterface
{
    public function handle(string $name);
}
