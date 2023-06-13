<?php

namespace App\UsesCases\Contracts\Users;

interface IndexUsersUseCaseInterface
{
    public function handle(string $role);
}
