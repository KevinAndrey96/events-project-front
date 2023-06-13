<?php

namespace App\UsesCases\Contracts\Users;

use Illuminate\Support\Facades\Request;

interface StoreUsersUseCaseInterface
{
    public function handle(string $name, string $email, string $role, string $password);
}
