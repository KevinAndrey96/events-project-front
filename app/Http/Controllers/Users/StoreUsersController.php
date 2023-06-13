<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UsesCases\Contracts\Users\StoreUsersUseCaseInterface;
use Illuminate\Http\Request;

class StoreUsersController extends Controller
{
    private StoreUsersUseCaseInterface $storeUsersUseCase;

    public function __construct(StoreUsersUseCaseInterface $storeUsersUseCase)
    {
        $this->storeUsersUseCase = $storeUsersUseCase;
    }

    public function __invoke(Request $request)
    {
        $this->storeUsersUseCase->handle(
            strval($request->input('name')),
            strval($request->input('email')),
            strval($request->input('role')),
            strval($request->input('password'))
        );

        return redirect()->route('users.index', ['role' =>  strval($request->input('role'))]);
    }
}
