<?php

namespace App\UsesCases\Contracts\Users;

interface ChangeStatusUsersUseCaseInterface
{
    public function handle(string $pk, string $sk):bool;
}
