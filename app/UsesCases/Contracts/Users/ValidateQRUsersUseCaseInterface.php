<?php

namespace App\UsesCases\Contracts\Users;

interface ValidateQRUsersUseCaseInterface
{
    public function handle(string $qrMessage);
}
