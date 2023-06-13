<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UsesCases\Contracts\Events\GetAllEventsUseCaseInterface;
use App\UsesCases\Contracts\Users\ValidateQRUsersUseCaseInterface;
use Illuminate\Http\Request;

class ValidateQrUsersController extends Controller
{
    private ValidateQRUsersUseCaseInterface $validateQRUsersUseCase;

    public function __construct(ValidateQRUsersUseCaseInterface $validateQRUsersUseCase)
    {
        $this->validateQRUsersUseCase = $validateQRUsersUseCase;
    }

    public function __invoke(Request $request)
    {
        $validationQR = $this->validateQRUsersUseCase->handle($request->input('qr-message'));

        return view('users.validationQR', ['validationQR' => $validationQR]);
    }

}
