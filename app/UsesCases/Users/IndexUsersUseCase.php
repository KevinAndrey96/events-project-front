<?php

namespace App\UsesCases\Users;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\UsesCases\Contracts\Users\IndexUsersUseCaseInterface;

use Cassandra\Index;

class IndexUsersUseCase implements IndexUsersUseCaseInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(string $role)
    {
        return $this->userRepository->getUsers($role);
    }
}
