<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateUsersController extends Controller
{
    public function __invoke(string $role)
    {
        return view('users.create', ['role' => $role]);
    }
}
