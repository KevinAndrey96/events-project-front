<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UsesCases\Contracts\Users\IndexUsersUseCaseInterface;
use Illuminate\Http\Request;

class IndexUsersController extends Controller
{

    private IndexUsersUseCaseInterface $indexUsersUseCase;

    public function __construct(IndexUsersUseCaseInterface $indexUsersUseCase)
    {
        $this->indexUsersUseCase = $indexUsersUseCase;
    }

    public function __invoke($role)
    {
        $users = $this->indexUsersUseCase->handle($role);

        return view('users.index', ['users' => $users, 'role' => $role]);


    }
}
