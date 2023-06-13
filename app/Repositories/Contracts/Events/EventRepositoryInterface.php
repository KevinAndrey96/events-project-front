<?php

namespace App\Repositories\Contracts\Events;

interface EventRepositoryInterface
{
    public function getAll(string $name);
}
