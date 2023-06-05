<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateRecordsController extends Controller
{
    public function __invoke($pk)
    {
        return view('users.record', ['pk' => $pk]);
    }
}
