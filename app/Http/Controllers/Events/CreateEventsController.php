<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateEventsController extends Controller
{
    public function __invoke()
    {
        return view('events.create');
    }
}
