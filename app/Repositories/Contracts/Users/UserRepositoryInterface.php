<?php

namespace App\Repositories\Contracts\Users;

interface UserRepositoryInterface
{
    public function getUsers($role);
    public function saveUser(string $name, string $email, string $role, string $password);
}
