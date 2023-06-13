<?php

namespace App\UsesCases\Users;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\UsesCases\Contracts\Users\StoreUsersUseCaseInterface;
use Illuminate\Support\Facades\Request;

class StoreUsersUseCase implements StoreUsersUseCaseInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }



    public function handle(string $name, string $email, string $role, string $password)
    {
        $this->userRepository->saveUser($name, $email, $role, $password);
    }
}
